<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleOfUser($id){
        $getRole = DB::table('model_has_roles')
        ->whereIn('model_id', User::where('id', $id)->first())
        ->first();
        $userRole = DB::table('roles')
        ->where('id', $getRole->role_id)
        ->first(); 
        return $userRole->name;
    }
    public function index()
    {
        $users = User::all();
        $roles = new UsersController;
        return view('configuration.users', compact(
            'users','roles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')
        ->get(); 
        return view('configuration.users-create', compact(
            'roles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->password == $request->password_confirm) {    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $roles = DB::table('model_has_roles')->insert([
                'role_id' => $request->roles,
                'model_type' => 'App\Models\User',
                'model_id' => $user->id
            ]);
            return redirect()->back()->with('success', 'user create success !');
        }else {
            return redirect()->back()->with('error', 'password not match !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
