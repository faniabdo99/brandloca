<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use Mail;
use Image;
use Socialite;
//Models
use App\User;
//Mails
use App\Mail\WelcomeNewUser;
use App\Mail\EmailUpdatedMail;
use App\Mail\PasswordUpdatedMail;
use App\Mail\ResetPasswordMail;
class AuthController extends Controller{
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $r){
        //Validate the request
        $Rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $ErrorMessages = [
            'email.requried' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'هذا البريد الالكتروني غير صحيح',
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
            Mail::to($TheUser->email)->send(New WelcomeNewUser($TheUser));
            //Log the user in
            Auth::loginUsingId($TheUser->id);
            //Redirect to Homepage
            return redirect()->route('home');
        }
    }
    //Social Login
    public function redirectToProvider($provider){
      return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback(Request $r , $driver){
      $user = Socialite::driver($driver)->user();
      $FindUser = User::where('email' , $user->email)->get();
      if($FindUser->count() == 0){
        //Signup
        $ProfileImage = (isset($user->avatar)) ? $user->avatar : 'user.png';
        $NewUser = User::create([
          'first_name' => $user->name,
          'email' => $user->email,
          'image' => $ProfileImage,
          'password' => 'PlaceholderPass',
          'auth_provider' => $driver,
          'code' =>  rand(0,99999999),
          'confirmed' => 1
        ]);
        //Send Welcome Email
        auth()->loginUsingId($NewUser->id);
        return redirect()->route('home');
      }else{
        auth()->loginUsingId($FindUser->first()->id);
        return redirect()->route('home');
      }

    }
    public function resendConfirmationMail(Request $r){
        //Check if user existed
        $TheUser = User::findOrFail($r->user_id);
        if($TheUser){
            //Check if the user account is already activated
            if($TheUser->confirmed){
                return response("تم تأكيد هذا الحساب مسبقاً" , 409);
            }
            Mail::to($TheUser->email)->send(new WelcomeNewUser($TheUser));
            return response("تم ارسال رسالة التفعيل على بريدك الإلكتروني " , 200);
        }
    }
    public function getResetPage(){
      return view('auth.reset');
    }
    public function postResetPage(Request $r){
      //Validation
      $Rules = [
        'email' => 'required|email'
      ];
      $ErrorMessages = [
        'email.requried' => 'البريد الإلكتروني مطلوب',
        'email.email' => 'البريد الإلكتروني الذي أدخلته غير صالح !'
      ];
      $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all());
      }else{
        //Check if this email exists
        $TheUser = User::where('email',$r->email)->first();
        if($TheUser){
          //Send Reset Email
          Mail::to($TheUser->email)->send(new ResetPasswordMail($TheUser));
          return back()->withSuccess("تم ارسال رسالة الى بريدك الالكتروني المرتبط ب Arte Online, يرجى اتباع الخطوات الموجودة في الرسالة لاعادة تعيين كلمة المرور");

        }else{
          return back()->withErrors("هذا البريد الالكتروني غير موجود");
        }
      }
    }
    public function getChoosePasswordPage($email,$code){
      $TheUser = User::where('email' , $email)->first();
      if($TheUser){
        if(md5($TheUser->code) == $code){
          //Return the Page
          return view('auth.choose-password' , compact('TheUser'));
        }else{
          return redirect()->route('home')->withErrors('الكود التعريفي للمستخدم غير صحيح');
        }
      }else{
        return redirect()->route('home')->withErrors('لا يوجد مستخدم بهذا البريد الإلكتروني');
      }
    }
    public function postChoosePasswordPage(Request $r){
      //Validation
      $Rules = [
        'user_id' => 'required|numeric',
        'user_code' => 'required',
        'password' => 'required|min:5|confirmed',
      ];
      $ErrorMessages = [
        'user_id.required' => 'حدث خطأ غير متوقع, يرجى المحاولة مجدداً',
        'user_id.numeric' => 'حدث خطأ غير متوقع, يرجى المحاولة مجدداً',
        'user_code.required' => 'حدث خطأ غير متوقع, يرجى المحاولة مجدداً',
        'password.required' => 'حقل كلمة المرور مطلوب',
        'password.min' => 'لا يمكن أن تكون كلمة المرور أقل من 5 أحرف',
        'password.confirmed' => 'تأكيد كلمة المرور غير متطابق !'
      ];
      $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all());
      }else{
        $TheUser = User::findOrFail($r->user_id);
        if($TheUser){
          if(md5($TheUser->code) == $r->user_code){
            //Update The Passowrd
            $TheUser->update(['password' => Hash::make($r->password)]);
            Auth::loginUsingId($TheUser->id);
            return redirect()->route('profile');
          }else{
            return back()->withErrors('حدث خطأ غير متوقع, يرجى المحاولة مجدداً');
          }
        }else{
          return back()->withErrors('حدث خطأ غير متوقع, يرجى المحاولة مجدداً');
        }
      }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    public function getProfile(){
        if(auth()->check()){
            return view('auth.profile');
        }else{
            abort(403);
        }
    }
    public function getEditProfile(){
        return view('auth.edit');
    }
    public function postEditProfile(Request $r){
      //Request Validation
      $Rules = [
        'first_name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'email' => 'required|email',
        'image' => 'nullable|image|max:5000',
        'phone_number' => 'nullable|numeric',
        'zip_code' => 'nullable|numeric'
      ];
      if(auth()->user()->email !== $r->email){
        $Rules = [
          'email' => 'required|email|unique:users',
        ];
      }
      $ErrorMessages = [
        'first_name.required' => 'حقل الاسم الأول مطلوب',
        'first_name.min' => 'لا يمكن لحقل الاسم الأول ان يكون أقل من حرفين',
        'last_name.required' => 'حقل الكنية / النسبة مطلوب',
        'last_name.min' => 'لا يمكن لحقل الكنية أن يكون أقل من حرفين',
        'email.requried' => 'البريد الإلكتروني مطلوب',
        'email.unique' => 'هذا البريد الإلكتروني مستخدم من قبل !',
        'image.image' => 'يجب أن تكون الصورة الشخصية صورة فعلية',
        'image.max' => 'الحد الأقصى لحجم الصورة هو 4.5 ميغا بايت',
        'phone_number.numeric' => 'صيغة رقم الهاتف غير صحيحة',
        'zip_code.numeric' => 'صيغة الرمز البريدي غير صحيحة'
      ];
      $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all());
      }else{
        $TheUser = User::find(auth()->user()->id);
        $UserData = $r->all();
        //Handle the image updload
        if($r->has('image')){
          //Upload The Image
          $Image = Image::make($r->image)->resize(180,180, function ($constraint) {
              $constraint->aspectRatio();
          });
          $Image->save('storage/app/public/users/'.$TheUser->id.'.'.$r->image->getClientOriginalExtension());
          $UserData['image'] = $Image->basename;
        }
        if($r->has('email') && $r->email != $TheUser->email){
          //Deactivate the Account
          $UserData['confirmed'] = 0;
          //Send Activation Email to the New Account
          Mail::to($r->email)->send(new EmailUpdatedMail($TheUser));
        }
        //Update the User Data
        $TheUser->update($UserData);
        return back()->withSuccess('تم تحديث ملفك الشخصي بنجاح');
      }
    }
    public function postUpdatePassword(Request $r){
      //Validate the request
      $Rules = [
        'current_pass' => 'required',
        'password' => 'required|min:5|confirmed',
      ];
      $ErrorMessages = [
        'current_pass.required' => 'كلمة المرور الحالية مطلوبة',
        'password.required' => 'حقل كلمة المرور الجديدة مطلوب',
        'password.min' => 'لا يمكن أن تكون كلمة المرور الجديدة أقل من 5 أحرف',
        'password.confirmed' => 'تأكيد كلمة المرور غير متطابق !'
      ];
      $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all());
      }else{
        //Update pass
        $TheUser = User::find(auth()->user()->id);
        if(Hash::check($r->current_pass , $TheUser->password)){
          $TheUser->update(['password' => Hash::make($r->password)]);
          Mail::to($TheUser->email)->send(new PasswordUpdatedMail);
          return back()->withSuccess('تم تحديث كلمة المرور');
        }else{
          return back()->withErrors('كلمة المرور الحالية غير صحيحة');
        }
      }
    }
    public function getApproveAccount($code){
      $TheUser = User::where('code' , $code)->first();
      if($TheUser){
        if($TheUser->confirmed){
          return redirect()->route('profile')->withErrors('لقد قمت بتأكيد حسابك مسبقاً');
        }
        if($TheUser->email == auth()->user()->email){
          $TheUser->update(['confirmed' => 1]);
          return redirect()->route('profile')->withSuccess('تم تأكيد حسابك بنجاح ! شكراً لك');
        }else{
          return redirect()->route('profile')->withErrors('كود التأكيد غير متوافق  , تأكد من الدخول عبر البريد الإلكتروني الذي ارسالناه اليك');
        }
      }else{
        return redirect()->route('profile')->withErrors('كود التأكيد غير متوافق  , تأكد من الدخول عبر البريد الإلكتروني الذي ارسالناه اليك');
      }
    }
    public function getWishlist(){
        return view('auth.wishlist');
    }
    public function getReport(){
        return view('auth.report');
    }
    public function postReport(Request $r){
        //Validate the request
        $Rules = [
            'subject' => 'required',
            'message' => 'required'
        ];
        $ErrorMessages = [
            'subject.required' => 'يرجى ادخال عنوان الرسالة',
            'message.required' => 'يرجى ادخال نص الرسالة'
        ];
        $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
        if($Validator->fails()){
            return response($Validator->errors()->first(),417);
        }else{
            //TODO: Send the report message
        }
    }


    //Admin Realted Functions
    public function getHome(){
      $Users = User::latest()->get();
      return view('admin.user.index' , compact('Users'));
    }
    public function delete(Request $r){
      $User = User::findOrFail($r->item_id)->delete();
      return response("User Deleted Successfully");
    }
    public function ToggleActive(Request $r){
      $User = User::findOrFail($r->item_id)->first();
      $User->confirmed = !$User->confirmed;
      $User->save();
      if($User->confirmed == 1){
        return response([
          'successMessage' => 'User Activated',
          'btnMessage' => 'Deactivate'
        ]);
      }else{
        return response([
          'successMessage' => 'User Deactivated',
          'btnMessage' => 'Activate'
        ]);
      }
    }
}
