<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Validator;
use Illuminate\Support\Facades\Http;
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
    public function getAbout(){return view('static.about');}
    public function testPaymob(){
      $response = Http::post('https://accept.paymobsolutions.com/api/auth/tokens',[
          'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SnVZVzFsSWpvaWFXNXBkR2xoYkNJc0ltTnNZWE56SWpvaVRXVnlZMmhoYm5RaUxDSndjbTltYVd4bFgzQnJJam8yTURjeU4zMC5WYXUwVXNKS1UwNHV5cXF0VTFtN1lUdUtUQ2NfNkxqQk9RNlVJOTdjQU15OFk4d0JJU0ZMVlE4QnlraU9nbURzMWJfVUxZNkpuam9XMVdsXzlaa2xjdw==',
      ]);
      $ParseJson = json_decode($response->body());
      $Token = $ParseJson->token;
      //Send Order Request
      $OrderRequest = Http::post('https://accept.paymobsolutions.com/api/ecommerce/orders' , [
        'auth_token' => $Token,
        'delivery_needed' => true,
        'amount_cents' => 5000,
        'currency' => 'EGP',
        'merchant_order_id'=> 1,
        'items' => [
          [
              'name' => 'ASC1515',
              'amount_cents' => 500000,
              'description' => 'Smart Watch',
              'quantity' => 1
          ]
      ],
      'shipping_data' => [
          'apartment' => 6, 
          'email' => 'claudette09@exa.com', 
          'floor' => 4, 
          'first_name' => 'Clifford', 
          'street' => 'Ethan Land', 
          'building' => 4645, 
          'phone_number' => '+86(8)9135210487', 
          'postal_code' => '01898', 
          'city' => 'Jaskolskiburgh', 
          'country' => 'CR', 
          'last_name' => 'Nicolas', 
          'state' => 'Utah'
        ],
          'shipping_details'=> [
              'notes' =>  ' fdsafsda',
              'number_of_packages'=>  1,
              'weight' =>  25,
              'weight_unit' =>  'Kilogram',
              'length' =>  1,
              'width' => 1,
              'height' => 1,
              'contents' =>  'product of some sorts'
          ]
      ]);
      //Order Created
      $PaymentRequest = Http::post('https://accept.paymobsolutions.com/api/acceptance/payment_keys' , [
        'auth_token' => $Token,
        'delivery_needed' => true,
        'expiration' => 3600, 
        'amount_cents' => 50000,
        'currency' => 'EGP',
        'integration_id'=> 155229,
        'billing_data' => [
            'apartment' => 803, 
            'email' => 'claudette09@exa.com', 
            'floor' => 42, 
            'first_name' => 'gfd', 
            'street' => 'fdsgdfnd', 
            'building' => 8028, 
            'phone_number' => '+86(8)9135210487', 
            'postal_code' => '01898', 
            'city' => 'Jaskolskiburgh', 
            'country' => 'CR', 
            'last_name' => 'Nicolas', 
            'state' => 'Utah'
          ]
      ]);
      $PaymentToken = json_decode($PaymentRequest->body());
      $FrameID = 154258;
      $PaymentID = $PaymentToken->token;
      return view('pay' , compact('FrameID','PaymentID'));
    }
}
