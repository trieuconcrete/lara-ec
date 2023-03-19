<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFromRequest;

class UserController extends BaseController
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }

    public function save(UserFromRequest $request)
    {
        try {
            $request->validated();
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = 1;
            $user->status = 1;
            
            $user->save();
            $user->assignRole($request->role);
            return redirect(route('admin.user.index'))->with('message', 'User Added Successfully!');
        } catch(\Exception $e) {
            return redirect(route('admin.user.create'))->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UserFromRequest $request, $user)
    {
        try {
            $request->validated();
            $user = User::findOrFail($user);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->status = $request->status;
            
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            // store file
            if ($request->hasFile('avatar')) {
                $avatar = $this->uploadImage($path = 'uploads/user/', $request->file('avatar'), $user->avatar);
            }

            $user->update();
            $user->assignRole($request->role);
            // update user detail
            $user->userDetail()->update(['avatar' => $avatar]);
            return redirect(route('admin.user.index'))->with('message', 'User Updated Successfully!');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', "Oops an error occurred!</br>".$e->getMessage());
        }
    }
}
