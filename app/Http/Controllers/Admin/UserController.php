<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Visualizar usuarios')->only('index');
        $this->middleware('can:Editar usuarios')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users =  User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index');
    }

    public function upgradeUserToInstructor()
    {
        $rol = Role::whereName('Instructor')->first();
        if($rol == null) {
            return redirect()->route('home')->with('info', 'Esta opcion no se encuentra disponible');
        } elseif (Auth::user()->hasRole('Instructor')) {
            return redirect()->route('instructor.courses.index');
        } else {
            $user = Auth::user();
            $user->roles()->attach($rol->id);
            return redirect()->route('instructor.courses.index')->with('info', 'Nivel creado correctamente');
        }
    }
}
