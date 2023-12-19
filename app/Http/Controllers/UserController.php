<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        return view('user.createUser');
    }
    public function store(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            // Add validation rules for each field
            'password' => 'required|string',
            'skills' => 'nullable|string',
            'username' => 'required|string|unique:users',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
             'is_staff' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'is_superuser' => 'nullable|boolean',
            // 'date_joined' => 'required|date',
            'phoneNo' => 'nullable|string',
            'gender' => 'required|string',
            'dateOfBirth' => 'nullable|date',
            // 'profilePhoto' => 'nullable|string',
            'facebook' => 'nullable|string',
            'github' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'twitter' => 'nullable|string',
            'bio' => 'nullable|string',
            'role' => 'nullable|string',

        ]);

        // Create a new user with the validated data
        $user = User::create($validatedData);

        if($request->hasFile('profilePhoto'))
        {
            //dd('helo');

           $file = $request->file('profilePhoto');

            $ext = $file->getClientOriginalExtension();

            $filename = time().'.'.$ext;
            $file->move('assets/uploads/userImage/',$filename);

            $user->profilePhoto=$filename;
            $user->save();
        }
        // Redirect to a success page or return a response
        return redirect()->route('user.listAll')->with(['success' => 'User created successfully', 'user' => $user]);


    }
    public function listAllUsers()
    {
        $users = User::all();

        return view('user.listAllUser', compact('users'));
    }

public function frontshow()
{
    $users = User::all();

    return view('frontUser', compact('users'));

}


    public function edit($id)
    {

        $user = User::find($id);

        return view('User.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'skills' => 'nullable|string', // Add other validations for fields as needed
            'is_staff' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'date_joined' => 'nullable|date',
            'phoneNo' => 'nullable|string',
            'gender' => 'nullable|string',
            'dateOfBirth' => 'nullable|date',
            'profilePhoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facebook' => 'nullable|string',
            'is_superuser' => 'nullable|boolean',
            'github' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'twitter' => 'nullable|string',
            'bio' => 'nullable|string',
            'role' => 'nullable|string',
            // Add more validations for other fields
        ]);

        $user = User::findOrFail($id);
        if($request->hasFile('photo'))
        {
            $path = 'assets/uploads/userImage/'.$user->profilePhoto;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('profilePhoto');

            // dd($file);
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/userImage/',$filename);
            $user->profilePhoto =$filename;
        }
        // Update basic fields
        $user->update([

            'username' => $request->input('username'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'skills' => $request->input('skills'),
            'is_staff' => $request->input('is_staff'),
            'is_active' => $request->input('is_active'),
            'date_joined' => $request->input('date_joined'),
            'phoneNo' => $request->input('phoneNo'),
            'gender' => $request->input('gender'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'facebook' => $request->input('facebook'),
            'is_superuser' => $request->input('is_superuser'),
            'github' => $request->input('github'),
            'instagram' => $request->input('instagram'),
            'linkedin' => $request->input('linkedin'),
            'twitter' => $request->input('twitter'),
            'bio' => $request->input('bio'),
            'role' => $request->input('role'),
            // Add more fields as needed
        ]);



        return redirect()->route('user.listAll', $id)->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {

        $user = User::find($id);

        if (!$user) {
            abort(404, 'User not found');
        }
        $user->delete();
        return redirect()->route('user.listAll')->with('success', 'User deleted successfully!');
    }

}
