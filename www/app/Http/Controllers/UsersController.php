<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function index()
    {
       /*  $users = User::where('id', '<', '10')->get();
        dd($users);
        */
        
        $users = User::get();

        return view('user.index', [
            'users' => $users
        ]);
        
    }

     public function create()
    {
        return view('user.create');
    }


    public function store(UserStoreRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => 'required|unique:users|email',
            'password' => 'required|string|min:8|max:16'
        ]);
        
      // SEM VALIDAÇÃO $atributes = $request->only(['name', 'email', 'password']);
      $atributes = $request->validate();
      User::create($atributes);
       
       return \Redirect()->route('user.index');
    }

    public function show($id = null)
    {

        // return $id;

        // Ex1: $user = User::find($id);
        // Ex2: $user = User::where('id', $id)->get();
        // Ex3: $user = User::where('id', $id)->first();
        // dd($user);

        $user = User::find($id);
        
        return view('user.show', [
            'user' => $user
        ]);



    }

    public function edit($id)
    {
       $user = User::find($id);

       if (!$user) return throw new ModelNotFoundException();

       return view('user.edit', [
           'user' => $user
       ]);

    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email']);

        $user = User::find($id);
        $user->update($data);
       
        return \Redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
       
        return \Redirect()->route('user.index');

    }
}
