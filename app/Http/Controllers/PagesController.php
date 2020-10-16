<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Validator;
//Mails
use App\Mail\ContactUsMail;
class PagesController extends Controller{
    public function getContact(){
        return view('contact');
    }
    public function postContact(Request $r){
      //Validate The Request
      $Rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required'
      ];
      $ErrorMessages = [
        'name.required' => 'حقل الاسم مطلوب',
        'subject.required' => 'عنوان الرسالة مطلوب',
        'email.requried' => 'البريد الإلكتروني مطلوب',
        'email.email' => 'البريد الإلكتروني الذي أدخلته غير صالح !',
        'message.required' => 'حقل الرسالة مطلوب'
      ];
      $Validator = Validator::make($r->all() , $Rules , $ErrorMessages);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all());
      }else{
        //Send The Message
        Mail::to('faniabdo99@gmail.com')->send(new ContactUsMail($r->all()));
        return back()->withSuccess('تم الارسال بنجاح!');
      }
    }
    public function getPrivacyPolicy(){return view('static.privacy-policy');}
    public function getReturnPolicy(){return view('static.return-policy');}
    public function getCheckout(){
        return view('checkout');
    }
    public function getCategoryPage(){
        return view('category');
    }
}
