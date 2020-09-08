<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
//Models
use App\User;
class AuthController extends Controller{
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $r){
        //Validate the request
        $Rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $ErrorMessages = [
            'email.requried' => 'البريد الإلكتروني مطلوب',
            'password.required' => 'حقل كلمة المرور مطلوب'
        ];
        $validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all());
        }else{
            //Login
            $SaveLogin = ($r->save_login == 'yes') ? true : false;
            $Attempt = Auth::attempt(['email' => $r->email , 'password' => $r->password] , $SaveLogin);
            if($Attempt){
                //Logged In 
                return redirect()->route('home');
            }else{
                return back()->withErrors('معلومات الدخول غير صحيحة !');
            }
        }
    }
    public function getSignup(){
        return view('auth.signup');
    }
    public function postSignup(Request $r){
        //Validate the request
        $Rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ];
        $ErrorMessages = [
            'first_name.required' => 'حقل الاسم الأول مطلوب',
            'last_name.required' => 'حقل الكنية / النسبة مطلوب',
            'email.requried' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني الذي أدخلته غير صالح !',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم من قبل !',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'لا يمكن أن تكون كلمة المرور أقل من 5 أحرف',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق !'
        ];
        $validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all());
        }else{
            //Create the User Account
            $UserData = $r->except('password_confirmation');
            $UserData['code'] = rand(1,9999);
            $UserData['password'] = Hash::make($r->password);
            $TheUser = User::create($UserData);
            //TODO: Send Welcome Mail + Confirm Email to User
            //Log the user in
            Auth::loginUsingId($TheUser->id);
            //Redirect to Homepage
            return redirect()->route('home');
        }
    }
    //TODO: Social Media Login Systems
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
