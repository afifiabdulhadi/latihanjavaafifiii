<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class User2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datauser = User::all();
        return view('user.index', compact('datauser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'namalengkap' => 'required|string|max:255',
            'username' => 'required|string|email|max:255|unique:users,email', // Ensure the username is a valid email
            'password' => 'required|string|min:6',
            'status' => 'required|in:admin,transaksi',
        ]);

        // Save data
        User::create([
            'name' => $request->namalengkap,
            'email' => $request->username,
            'password' => bcrypt($request->password), // Encrypt password
            'status' => $request->status,
        ]);

        // Redirect back to user list with success message
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        return view('user.edit', compact('user')); // Pass user data to the edit view
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
        $this->validate($request, [
            'namalengkap'=> 'required',
            'username'=> 'required',
            'status'=> 'required'
        ]);
        $pas= $request->password;
        $user=User::find($id);
        if($pas=="")
        {
            $user->update([
                'name'=> $request->namalengkap,
                'email'=> $request->username,
                //'password'=> Hash::make($pas),
                'status'=> $request->status
            ]);
        }else{
            $user->update([
            'name'=> $request->namalengkap,
            'email'=> $request->username,
            'password'=> Hash::make($pas),
            'status'=> $request->status 
        ]);
        }
       
        if($user)
        {
            return redirect()->route('user.index');
        }else{
            return redirect()->route('user.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        // Redirect back to user list with success message
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
