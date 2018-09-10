<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\Http\Requests\UserRequest;

// Models
use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Retrieving all users to be displayed.
        $users = User::all();

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // Retrieving all roles.
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $username = $request->name;
        $role_id = $request->role;
        $email = $request->email;
        $password = $request->password;
        $status = $request->status;

        $name = 'default.jpg';

        $user = User::create([
            'name' => $username,
            'email' => $email,
            'role_id' => $role_id,
            'password' => bcrypt($password),
            'is_active' => $status,
        ]);
        
        if($file = $request->file('img')){

            $name = time() . $file->getClientOriginalName();

            $file->move($user->directory, $name);

        }

        $photo = Photo::create(['file' => $name]);

        $user->photos()->save($photo);
		
		Session::flash('message', 'The user has been saved!');

        return redirect(route('admin.users.index'));
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
        
		$user= User::findOrFail($id);
		$roles = Role::pluck('name', 'id')->all();	
			
        return view('admin.users.edit', compact('user', 'roles'));
		
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
     	        
		$edited_user = User::findOrFail($id);
		
		$edited_user->update([
			'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
            'is_active' => $request->status,
		]);
		
		if($password = $request->password){
						
			$edited_user->update(['password' => bcrypt(trim($password))]);
			
		}
		
		if($image = $request->file('img')){
				
			$name = time() . $image->getClientOriginalName();
			
			$image->move($edited_user->directory, $name);
			
			$profile_picture = $edited_user->photos()->update(['file' => $name]);
				
		}
		
		Session::flash('message', 'The user has been updated!');	
		
	    return redirect(route('admin.users.index'));
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
		$user = User::findOrFail($id);
		
		if($user->photos->file !== 'default.jpg')
			unlink(public_path() . $user->file);
		
		$user->photos()->delete();
		
		$user->delete();
		
		Session::flash('message', 'The user has been deleted!');
				
		return redirect(route('admin.users.index'));
		
    }
}
