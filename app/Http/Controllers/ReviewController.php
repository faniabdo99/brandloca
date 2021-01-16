<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Review;
class ReviewController extends Controller{
    public function postReview(Request $r){
        //Validate the request
        $Rules = [
            'rate' => 'required|numeric',
            'product_id' => 'required|numeric',
            'review' => 'required|max:255'
        ];
        $Messages = [
            'rate.required' => 'يرجى اختيار أحد النجوم',
            'rate.numeric' => 'حقل التقييم غير صالح',
            'product_id.required' => 'رقم المنتج مطلوب',
            'product_id.numeric' => 'رقم المنتج غير صالح',
            'review.required' => 'حقل المراجعة مطلوب',
            'review.max' => 'لا يمكن ان تزيد المراجعة عن 255 حرف' 
        ];
        $Validator = Validator::make($r->all(), $Rules);
        if($Validator->fails()){
            return back()->withErrors($Validator->errors()->all());
        }else{
            $HasReviewed = Review::where('user_id',auth()->user()->id)->where('product_id',$r->product_id)->first();
            $ReviewContent = $r->all();
            if($HasReviewed){
                //Update the review
                $HasReviewed->update($ReviewContent);
            }else{
                //Add New Review
                $ReviewContent['user_id'] = auth()->user()->id;
                Review::create($ReviewContent);
            }
            return back()->withSuccess('شكراً لك على تقييمك!');
        }
    }
}
