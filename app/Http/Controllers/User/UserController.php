<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(15);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function storeUser(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'numeric', 'min:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string']
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $user =  User::create($request->all());
        return redirect('users')->with('success', 'User created successfully!');
    }

    public function edit ($id){
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function addProfile($id){
        $user = User::findOrFail($id);
        return view('admin.user.add-profile', compact('user'));
    }

    public function update(Request $request, User $user){
        
        if(isset($request->password)){
            $request['password'] = bcrypt($request['password']);
        }else{
            $request['password'] = $user->password;
        }

        $user->update($request->all());

        return redirect('users')->with('success', 'User Updated Successfully!');

    }

    public function delete ($id){
        
        $user = User::findOrFail($id);
        
        if(!$user){
            abort(404);
        }
        
        $user->delete();

        return redirect('users')->with('success', 'User Deleted Successfully!');
    }

    public function storeProfile (Request $request){

        $request->validate([
            'user_id' => 'required|unique:user_profiles',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'document' => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'years_practiced' => 'required|string',
            'nmc_number' => 'required|string',
            'speciality' => 'required|string',
            'qualification' => 'required|string',
            'description' => 'required|string',
        ],[
            'user_id.unique' => 'Profile already added!'
        ]);

        $inputs = $request->all();

        $user = User::find($request->user_id);

        if($user->role != 'doctor'){
            abort(403, 'Permission denied for this role of user!');
        }

        if($request->profile_image){
            $fileName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('uploads/doctor-profile'), $fileName);
            $inputs['profile_image'] = $fileName;
        }

        if($request->document){
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('uploads/doctor-document'), $fileName);
            $inputs['document'] = $fileName;
        }

        UserProfile::create($inputs);

        return redirect('users')->with('success', 'Profile stored successfully!');

    }

    public function updateProfile(Request $request, $id){

        $userProfile = UserProfile::find($id);

        $request->validate([
            'user_id' => 'required',
            'profile_image' => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'document' => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|string',
            'years_practiced' => 'required|string',
            'nmc_number' => 'required|string',
            'speciality' => 'required|string',
            'qualification' => 'required|string',
            'description' => 'required|string',
        ],[
            'user_id.unique' => 'Profile already added!'
        ]);

        $requests = $request->all();

        $user = User::find($request->user_id);

        if($request->profile_image){
            $fileName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('uploads/doctor-profile'), $fileName);
            $requests['profile_image'] = $fileName;
        }else{
            $requests['profile_image'] = $userProfile->profile_image;
        }

        if($request->document){
            $file = time().'.'.$request->document->extension();  
            $request->document->move(public_path('uploads/doctor-document'), $file);
            $requests['document'] = $file;
        }else{
            $requests['document'] = $userProfile->document;
        }

        $userProfile->update($requests);

        return redirect('users')->with('success', 'Profile updated successfully!');
    }
}
