<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Gate::allows('is-admin')) {
        //     dd('success');
        // }
        // else {
        //     dd('need admin credetials');
        // }
        $users =  User::all();
        // dd($users[0]->roles()->get());
        return view('backend.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users =  User::pluck('id', 'category_name');
        $roles = config('constants.user_role');
        // dd($roles['jamaah']);
        return view('backend.admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        foreach ($request->role as $newRole) {
            $user->userRoles()->create(['user_id' => $user->id, 'role_id' => $newRole]);
        }
        return redirect()->route('admin.user.index');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->find('id');
        // $roles = UserRole::pluck('id', 'role_name');
        return view('backend.admin.users.edit', compact('user', 'roles'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->find($user->id);
        // dd($user->roles->pluck('id')->toArray());
        $roles = [UserRole::JAMAAH, UserRole::SEKRE, UserRole::ADMIN];
        // dd($user->userRoles->pluck('role_id')->toArray());
        return view('backend.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $getUser = $user->find($user->id);
        $getUserRole = $getUser->userRoles()->pluck('role_id')->toArray();
        // ** check if either request->role == null or reques->role have exact value of current user_role data */
        if (empty($request->role) OR $getUserRole === $request->role) {
            dd('no changes');
        }

        // ** Delete all user_roles data, then create a new one. On paper can exaust id's auto incr. but that won't happen right? :)*/
        $getUser->userRoles()->delete();
        foreach ($request->role as $newRole) {
            $user->userRoles()->create(['user_id' => $user->id, 'role_id' => $newRole]);
        }
        dd('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
