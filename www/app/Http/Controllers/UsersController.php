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
     
        $users = User::with('address')->get();

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
        // dd('chegou'); 
        $atributes = $request->validated();
       
        $atributes['password'] = bcrypt($atributes['password']);

       // dd($atributes); 

        $user = User::create($atributes); // JOGANDO O OBJETO PARA VARIÁVEL
        $user->Address()->create($atributes); // UTILIZANDO O FILLABLE DO MODEL

        // $request->validate([
        //     'name' => ['required', 'string'],
        //     'email' => 'required|unique:users|email',
        //     'password' => 'required|string|min:8|max:16'
        // ]);
        
      // SEM VALIDAÇÃO $atributes = $request->only(['name', 'email', 'password']);
      
      // User::create($atributes);
       
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


    public function address($id)
    {
        $user = User::with(['address', 'post'])->find($id);
        return $user;


    }

}
