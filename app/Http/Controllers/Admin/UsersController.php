<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->oldest('id')
            ->paginate();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['is_working'] = $request->has('is_working');

        User::query()->create($data);

        return redirect()->route('admin.users.index');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, UserRequest $request): RedirectResponse
    {
        $request['is_working'] = $request->has('is_working');
        if ($request->has('password')) {
            $request['password'] = Hash::make($request->get('password'));
            $user->update($request->all());
        } else {
            $user->update($request->except('password'));
        }
        return redirect()->back();
    }

    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();
        } catch (\Exception) {
            return redirect()->back()->with('message', 'Error on delete');
        }

        return redirect()->back()->with('message', 'Successfully deleted');
    }
}
