<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class ForgetPasswordManager extends Controller
{
    //
    public function forgetPassword()
    {
        return view('login.forget-password');
    }

    public function forgetPasswordPost(Request $request)
    {
        //

        try {
            $email = $request->input('email');
            $user = Users::where('email', $email)->first();
            if ($user) {
                // Tạo mã đặt lại mật khẩu
                $resetPW = substr(md5(rand(0, 999999)), 0, 8);

                // Gửi email (bạn cần tạo một view và một mailable)

                Mail::send("emails.forget-password", ['resetPW' => $resetPW], function ($message) use ($request){
                    $message->to($request->email);
                    $message->subject("Reset Password");
                });

                // Lưu mã đặt lại mật khẩu
 
                $user->password = Hash::make($resetPW);
                $user->save();

                return redirect()->to(route('forget.password'))->with('success', 'Mật khẩu mới đã được gửi đến email của bạn. Vui lòng kiểm tra hộp thư đến của bạn.');
            }
            else {
                return redirect()->to(route('forget.password'))->with('error', 'Email này chưa được đăng kí.');
            }
        } 
        catch (\Exception $e) {
            Log::error('Error sending email: ' . $e->getMessage());
            return redirect()->to(route('forget.password'))->with('error', 'Có lỗi xảy ra khi gửi email đặt lại mật khẩu. Vui lòng thử lại sau.');
        }
    }
    //

    public function resetPassword()
    {
        return view('login.reset-password');
    }
    public function resetPasswordPost(Request $request)
    {
        try {
            // $request->validate([
            //     'passwordold' => 'required',
            //     'passwordnew' => 'required|min:6',
            //     'passwordAgain' => 'required|same:passwordnew',
            // ],[
            //     'passwordnew.min' => 'Độ dài của mật khẩu phải lớn hơn 6. Vui lòng thử lại.',
            //     'passwordAgain.same' => 'Mật khẩu nhập lại không khớp. Vui lòng thử lại.'
            // ]);

            $validator = Validator::make($request->all(), [
                'passwordold' => 'required',
                'passwordnew' => 'required|min:6',
                'passwordAgain' => 'required|same:passwordnew'
            ],[
                'passwordnew.min' => 'Độ dài của mật khẩu phải lớn hơn 6. Vui lòng thử lại.',
                'passwordAgain.same' => 'Mật khẩu nhập lại không khớp. Vui lòng thử lại.'
            ]);
            $errors = collect($validator->errors()->messages())->map(function ($messages, $field) {
                return implode(' ', $messages);
            })->all();
            if ($validator->fails()) {
                return redirect()->route('reset.password')
                            ->withErrors($errors)
                            ->withInput();
            }
            
            $email = $request->input('email');
            $user = Users::where('email', $email)->first();
            
            if ($user) {

                if (!Hash::check($request->passwordold, $user->password)) {
                    return redirect()->to(route('reset.password'))->with('error', 'Mật khẩu cũ không đúng.');
                }

                $user->update([
                    'password' => Hash::make($request->passwordnew),
                ]);

                return redirect()->to(route('reset.password'))->with('success', 'Đổi mật khẩu thành công');
            }
            else {
                return redirect()->to(route('reset.password'))->with('error', 'Email này chưa được đăng kí.');
            }
        } 
        catch (\Throwable $th) {
            dd($th);
        }
    }
}