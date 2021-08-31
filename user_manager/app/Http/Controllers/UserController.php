<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    

    public function index() {
        $users = User::all();
        return view('user.index', [
            'data' => $users
        ]);
    }

    public function add() 
    {
        return view('user.add');
    }

    public function handle_addition(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name ,
            'last_name' => $request->last_name ,
            'country' => $request->country,
            'city' => $request->city,
            'country' => $request->country,
            'zip' => $request->zip,
            'password' => $request->password,
        ]);

        return redirect()->route('index');
    }

    public function edit($id) 
    {
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function handle_edition(Request $request, $id) 
    {
        // $user = User::find($id)
        //     ->update([
        //     'first_name' => $request->first_name ,
        //     'last_name' => $request->last_name ,
        //     'country' => $request->country,
        //     'city' => $request->city,
        //     'country' => $request->country,
        //     'zip' => $request->zip,
        //     'password' => $request->password,
        // ]);
        $user =  User::find($id)->update($request->only(['first_name', 'last_name', 'country', 'city', 'zip', 'password']));
        $user = User::find($id);

        return redirect()->route('index');
    }

    public function delete($id) 
    {
        $user = User::find($id);
        $user->delete();

        $users = User::all();
        return view('user.index', [
            'data' => $users
        ]);
    }

    public function search(Request $request) 
    {
        $input_search = $request->input('search')?? '';

        $users = User::where('first_name' ,'like' , '%' . $input_search. '%')
                        ->orWhere('last_name' ,'like' , '%' . $input_search. '%')
                        ->get();

        return view('user.index', [
            'data' => $users,
            'searched' => $input_search
        ]);
    }
}
