<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('frontend.index');
    } //end method

    public function UserProfile(){
        $id= Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.user_profile',compact('profileData'));
    } //end method

    public function UserUpdateProfile(Request $request){
        $id= Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_profile_dashboard/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_profile_dashboard'),$filename);
            $data['photo']= $filename;
        }

        $data->save();

        $notification = array(
            'message'       => 'User Profile Updated Successfully.',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);

    } //end method

    public function UserLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } //end method

    public function UserChangePassword(){
        $id= Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.dashboard.user_change_password',compact('profileData'));
    } //end method

    public function UserUpdatePassword(Request $request){
        $id= Auth::user()->id;
        $profileData = User::find($id);

        // $request->validate([
        //     'old_password'      => 'required',
        //     'new_password'      => 'required | confirmed',
        // ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            $notification = array(
                'message'       => 'Old Password Does Not Match!',
                'alert-type'    => 'error'
            );
            return back()->with($notification);
        }

        //updated the new password
        User::whereId(Auth::user()->id)->update([
            'password'      => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message'       => 'Password Changed Successfully.',
            'alert-type'    => 'success'
        );
        return back()->with($notification);
    } //end method
}
