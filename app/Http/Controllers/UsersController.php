<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::select('users.*', 'roles.*')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->paginate(5);
        ;
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $First_name = $request->input('First_name');
        $Last_name = $request->input('Last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $username = $request->input('username');
        $password = bcrypt($request->input('password'));
        $role = $request->input('role');
        $users = Users::get();
        if (!is_numeric($phone)) {
            return redirect('admin/users')->with('error', 'This Phone Not Valid!');
        }
        foreach ($users as $value) {
            if ($username == $value->username) {
                return redirect('admin/users')->with('error', 'This Username Already Exists! Please enter a different other');
            }
        }
        if (empty($role)) {
            return redirect('admin/users')->with('warning', 'Please Choose a Role!');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $target_dir = 'assets/img/';
            $target_file = $target_dir . basename($image);

            $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (!in_array($imgFileType, ['png', 'jpg', 'webp'])) {
                return redirect('admin/users')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
            }

            $image_name = 'image' . time() . '-' . $request->name . '.'
                . $request->image->extension();
            $request->image->move('assets/img', $image_name);

            $users = Users::create([
                'First_name' => $First_name,
                'Last_name' => $Last_name,
                'email' => $email,
                'phone' => $phone,
                'username' => $username,
                'password' => $password,
                'role_id' => $role,
                'image' => $image_name
            ]);
        } else {
            $users = Users::create([
                'First_name' => $First_name,
                'Last_name' => $Last_name,
                'email' => $email,
                'phone' => $phone,
                'username' => $username,
                'password' => $password,
                'role_id' => $role
            ]);
        }
        $users->save();
        return redirect('admin/users')->with('success', 'Create New User Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Roles::get();
        $userbyid = Users::get()
            ->where('user_id', $id);
        return view('admin.users.update', ['userbyid' => $userbyid, 'roles' => $roles]);
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
        $First_name = $request->input('First_name');
        $Last_name = $request->input('Last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $username = $request->input('username');
        $password = bcrypt($request->input('newpass'));
        $role = $request->input('role');
        $oldpass = $request->input('oldpass');
        $users = Users::find($id);
        if (!is_numeric($phone)) {
            return redirect('admin/users')->with('error', 'This Phone Number Not Valid!');
        }
        if (empty($role)) {
            return redirect('admin/users')->with('warning', 'Please Choose a Role!');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $target_dir = 'assets/img/';
            $target_file = $target_dir . basename($image);

            $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (!in_array($imgFileType, ['png', 'jpg', 'webp'])) {
                return redirect('admin/users')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
            }

            $image_name = 'image' . time() . '-' . $request->name . '.'
                . $request->image->extension();
            $request->image->move('assets/img', $image_name);
            if (!empty($password)) {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $password,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            } else {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $oldpass,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            }
        } else {
            $userimg = Users::get()->where('user_id', $id);
            foreach ($userimg as $user) {
                $image_name = $user->image;
            }
            if (!empty($password)) {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $password,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            } else {
                $users->update([
                    'First_name' => $First_name,
                    'Last_name' => $Last_name,
                    'email' => $email,
                    'phone' => $phone,
                    'username' => $username,
                    'password' => $oldpass,
                    'role_id' => $role,
                    'image' => $image_name
                ]);
            }
        }
        return redirect('admin/users')->with('success', 'Update User Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();
        return redirect('admin/users')->with('success', 'Delete User Successfully!');
    }

    public function login()
    {
        return view('login.index');
    }
    public function postLogin(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password, 'role_id' => 2])) {
            return redirect()->route('index');
        }
        return redirect()->back()->with('error', 'Đăng nhập thất bại');
    }
    public function register()
    {
        return view('login.register');
    }
    public function postRegister(Request $req)
    {

        // dd($req->password);
        try {
            $validator = Validator::make($req->all(), [
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6',
                'passwordAgain' => 'required|same:password',

            ],[
                'username.unique' => 'Tài khoản đã được đăng ký. Vui lòng nhập lại',
                'email.unique' => 'email này đã được đăng ký. Vui lòng nhập lại',
                'password.min' => 'Độ dài của mật khẩu phải lớn hơn 6. Vui lòng thử lại.',
                'passwordAgain.min' => 'Độ dài của mật khẩu phải lớn hơn 6. Vui lòng thử lại.',
                'passwordAgain.same' => 'Mật khẩu nhập lại không khớp. Vui lòng thử lại.'
            ]);

            $errors = collect($validator->errors()->messages())->map(function ($messages, $field) {
                return implode(' ', $messages);
            })->all();
            if ($validator->fails()) {
                return redirect()->route('register')
                    ->withErrors($errors)
                    ->withInput();
            }
            
            $password = bcrypt($req->input('password'));
            $user = Users::create([
                'First_name' => $req->input('First_name'),
                'Last_name' => $req->input('Last_name'),
                'username' => $req->input('username'),
                'password' => $password,
                'email' => $req->input('email'),
                'phone' => $req->input('phone'),
            ]);
            $user->save();
            return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công');
        } catch (\Throwable $th) {

            return redirect()->route('register')->with('error', 'Đăng ký tài khoản thất bại');
        }
    }
    public function logout()
    {

        Auth::logout();
        return redirect()->route('index');
    }

    public function profileUser($user_id)
    {
        $user = Users::with('role')->find($user_id);

        return view('profile', ['user' => $user]);
    }
    public function editProfileUser($user_id)
    {
        $user = Users::with('role')->find($user_id);
        return view('edit-profile', ['user' => $user]);
    }
    public function editProfileUserPost(Request $request)
    {
        $First_name = $request->input('First_name');
        $Last_name = $request->input('Last_name');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $user = Users::find(Auth::user()->user_id);
        if (!is_numeric($phone)) {
            return redirect()->route('profile', ['user_id' => $user->user_id])
                ->with('success', 'Số điện thoại không hợp lệ!!!');
        }
        $user->update([
            'First_name' => $First_name,
            'Last_name' => $Last_name,
            'phone' => $phone,
            'address' => $address,
        ]);

        return redirect()->route('profile', ['user_id' => $user->user_id])
            ->with('success', 'Hồ sơ được cập nhật thành công');
    }
    public function changeImageUser($user_id){
        $user = Users::find($user_id);
        return view('change-image', ['user' => $user]);
    }
    public function changeImageUserPost(Request $request, $user_id){
        $user = Users::find($user_id);
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $target_dir = 'assets/img/';
            $target_file = $target_dir . basename($image);

            $imgFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (!in_array($imgFileType, ['png', 'jpg', 'webp'])) {
                return redirect('admin/users')->with('warning', 'Only accept image formats JPG, PNG, or WEBP!');
            }

            $image_name = 'image' . time() . '-' . $request->name . '.'
                . $request->image->extension();
            $request->image->move('assets/img', $image_name);
            $user->update([
                'image' => $image_name
            ]);
        }
        return redirect()->route('profile', ['user_id' => $user->user_id])
            ->with('success', 'Ảnh được cập nhật thành công');
    } 

}