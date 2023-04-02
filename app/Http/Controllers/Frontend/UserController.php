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
        try {
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
                $user->update(['password' => Hash::make($request->password)]);
                Auth::logout();
            }
            return redirect()->back()->with('message', 'User Updated Successfully');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
