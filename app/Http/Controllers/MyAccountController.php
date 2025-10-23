<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;


class MyAccountController extends Controller
{
    public function my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('admin.my_account.update',$data);
       
    }

    public function my_account_update(Request $request)
    {
        // dd($request->all());
      $user = request()->validate([
        'email' => 'required|unique:users,email,'.Auth::user()->id
      ]);
      $user = User::find(Auth::user()->id);
      $user->name = trim($request->name);
      $user->email = trim($request->email);
      if(!empty($request->password)){

        $user->password = Hash::make($request->password);
      }
     if(!empty($request->file('profile_image')))
{
    // Delete existing image if any
    if(!empty($user->profile_image) && file_exists(public_path('upload/'.$user->profile_image))){
        unlink(public_path('upload/'.$user->profile_image));
    }

    // Handle new file upload
    $file = $request->file('profile_image');
    $randomStr = Str::random(30);
    $filename = $randomStr .'.'.$file->getClientOriginalExtension();
    $file->move(public_path('upload/'), $filename);
    $user->profile_image = $filename;
}

// Check if "Remove Image" is selected
if($request->has('remove_image') && $request->remove_image == 1) {
    if(!empty($user->profile_image) && file_exists(public_path('upload/'.$user->profile_image))) {
        unlink(public_path('upload/'.$user->profile_image));
    }
    $user->profile_image = null; // Remove image reference
}

      $user->save();

        return redirect('admin/my_account')->with('success','Account Updated Successfully');
    }

}