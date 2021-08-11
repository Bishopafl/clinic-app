<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $doctors = User::where('role_id','!=',3)->get();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store doctor information
        $this->validateStore($request);
        $data = $request->all(); // get all data
        $name = (new User)->userAvatar($request);

        $data['image'] = $name; // append hashed image name to data
        $data['password'] = bcrypt($request->password); // hash password to store in DB
        User::create($data); // stores all updated information into the users DB

        return redirect()->back()->with('message', 'Doctor added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = User::find($id);
        return view('admin.doctor.delete', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = User::find($id);
        return view('admin.doctor.edit', compact('doctor'));
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
        $this->validateUpdate($request, $id); 
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        // check if user updated image
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            unlink(public_path('images/'.$user->image));
        }
        $data['image'] = $imageName; // if user didn't upload image, use the image name assigned to the user
        // check if user updated password
        if ($request->password) {
            $data['password'] = bcrypt($request->password); // encrypt the new password
        } else {
            $data['password'] = $userPassword; // use the same password in the DB
        }
        $user->update($data);

        return redirect()->route('doctor.index')->with('message', 'Doctor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check if you are deleting yourself or not...
        if (auth()->user()->id == $id) {
            abort(401);
        }
        $user = User::find($id);
        $userDelete = $user->delete();
        // delete the profile picutre
        if ($userDelete) {
            unlink(public_path('images/'.$user->image));
        }
        
        return redirect()->route('doctor.index')->with('message', 'Doctor deleted successfully!');
    }

    public function validateStore($request) {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required',
        ]);
    }

    public function validateUpdate($request, $id) {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id, // we are passing the id of the user
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required',
        ]);
    }
}
