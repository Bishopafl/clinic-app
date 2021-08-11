<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {

        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required'
        ]);
        User::where('id', auth()->user()->id)->update($request->except('_token'));
        return redirect()->back()->with('message', 'Profile update successfully.');
    }

    public function profilePic(Request $request) {
        $this->validate($request,['file' => 'required|image|mimes:jpg,jpeg,png']);
        if ($request->hasFile('file')) {
            // get the image from the request
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/profile');
            $image->move($destination, $name);
            // find current logged in user and save the image
            $user = User::where('id',auth()->user()->id)->update(['image'=>$name]);
            
            // return user with message
            return redirect()->back()->with('message', 'Profile image update successfully.');

        }
    }
}
