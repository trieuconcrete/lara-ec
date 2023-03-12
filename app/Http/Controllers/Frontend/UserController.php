<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserProfileRequest;

class UserController extends Controller
{
    /**
     * Show the wishlist.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $user = User::with('userDetail')->find(auth()->user()->id);
        return view('frontend.profile', compact('user'));
    }

    public function update(UserProfileRequest $request)
    {
        $user = User::with('userDetail')->find(auth()->user()->id);
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'state' => $request->state,
            'country' => $request->country,
            'zipcode' => $request->zipcode,
            'phone' => $request->phone,
        ];
        
        $user->userDetail()->updateOrCreate(['user_id' => auth()->user()->id], $data);
        if ($request->is_update_password) {
            $currentPassword = Hash::check($request->current_password, auth()->user()->password);
            if ($currentPassword) {
                $user->update(['password' => Hash::make($request->password)]);
                Auth::logout();
            } else {
                return redirect()->back()->with('message', 'Current Password does not match with old Password');
            }
        }
        return redirect()->back()->with('message', 'User Updated Successfully');
    }
}
