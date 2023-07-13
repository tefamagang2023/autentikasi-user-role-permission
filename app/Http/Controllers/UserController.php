<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{
    //
    public function index()
    {

        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {

        return view('users.create');
    }

    public function store(User $user, StoreUserRequest $request)
    {
        $user->create(array_merge($request->validate(), [
            'password' => 'test'
        ]));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {

        $user->update($request->validated());

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(_('User Updated Succsessfully.'));
    }

    public function destroy(User $user)
    {

        $user->delete();

        return redirect()->route('users.index')
            ->withSuccseess(_('User deleted successfully.'));
    }
}
