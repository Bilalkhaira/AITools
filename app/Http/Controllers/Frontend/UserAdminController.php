<?php

namespace App\Http\Controllers\Frontend;

use File;
use Exception;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        // $favorte_tools = $user->tools()->wherePivot('filter', 'favorte_tool')->get();
        $favorite_tools = $user->tools()
                        ->where('status', 'Activate')->where('created_by', auth()->user()->id)
                        ->wherePivot('filter', 'favorte_tool')
                        ->with('images')
                        ->get();
        $tools = Tool::with('images')->where('status', 'Activate')->where('created_by', auth()->user()->id)->get();
        return view('frontend.admin-panel', compact(['tools', 'favorite_tools']));
    }

    public function myProfile()
    {
        return view('frontend.my-profile');
    }

    public function editProfile()
    {
        return view('frontend.edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $admin = User::where('id', '=', $request->updateId)->first();
        if(!empty($request->current_password )){
            if($request->password == $request->confirmpassword){

                if(Hash::check($request->current_password, $admin->password)){
                    $newpassword = Hash::make($request->password);
                    toastr()->success("Your Password updated successfully");

                 } else{
                    toastr()->error("Your Current password does not match our records");
                     return redirect()->back();
                 }
            }  else {
                toastr()->error("Password and confirm password is required");
                return redirect()->back();
            }
        }
        $imgpath = public_path('images/frontend/profile/');
        if (empty($request->profile_photo)) {
            $updateimage = $admin->profile_photo_path;
        } else {
            $imagePath =  $imgpath . $admin->profile_photo_path;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $file = $request->profile_photo;
            $fileName = time() . '.' . $file->clientExtension();
            $file->move($imgpath, $fileName);
            $updateimage = $fileName;
        }
        try {
            $admin->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'profile_photo_path' => $updateimage,
                'password'      => (!empty($newpassword)) ? $newpassword : $admin->password,
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        toastr()->success('Profile Updated Successfully"');
        return redirect()->back();
    }

}