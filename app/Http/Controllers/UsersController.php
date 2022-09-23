<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request) 
    {
        $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
             if($request->hasFile('avatar')){
                $filenameWithExt = $request->file('avatar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $filenameSimpan = $filename.'.'.$extension;
                $path = $request->file('avatar')->move('foto/user', $filenameSimpan);
                }else{
                $filenameSimpan = 'default.png';
                }
            $user->avatar = $filenameSimpan;

            // dd($user);
            $user->save();



        return redirect()->route('users.index')->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) 
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) 
    {
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     * 
     * @param User $user
     * @param UpdateUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request) 
    {
        // $user->update($request->validated());

         $user->name = $request->name;
        $user->email = $request->email;
        // $user->status = $request->boolean('status');
        if (empty($request->file('avatar'))){
                $user->avatar = $user->avatar;
            }
        else{
                unlink('foto/user/'.$user->avatar); //menghapus file lama
                $avatar = $request->file('avatar');
                $ext = $avatar->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $avatar->move('foto/user',$newName);
                $user->avatar = $newName;
            }

        // dd($user);
        $user->update();

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    public function aktif(User $user, Request $request)
    {
        $user->status = '1';

         $user->update();
         return redirect()->route('users.index')->withSuccess(__('User Active successfully.'));
    }

    
    public function non(User $user, Request $request)
    {
        $user->status = '0';

         $user->update();
         return redirect()->route('users.index')->withSuccess(__('User Non Active successfully.'));
    }

    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) 
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}