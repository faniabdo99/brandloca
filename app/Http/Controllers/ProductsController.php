<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Mail;
use Carbon\Carbon;
use DB;
//Models
use App\Category;
use App\Product;
use App\Product_Variation;
use App\Product_Image;
use App\Discount;
//Mails
use App\Mail\QuestionAboutProduct;
class ProductsController extends Controller{
    private function getAllTags(){
        $TagsList = Product::all()->pluck('tags');
        $MasterTagsArray = [];
        foreach($TagsList as $Tag){
            $Tag = explode(',' , $Tag );
            $CleanTag = array_unique($Tag);
            //Push to the master array
            array_push($MasterTagsArray , $CleanTag);
        }
        if(empty($MasterTagsArray)){
            $MasterTagsArray = [[], []];
        }
        $ReadyToUseTagsArray = array_unique($FinalMasterTagsArray = call_user_func_array('array_merge', $MasterTagsArray));
        return $ReadyToUseTagsArray;
    }
    //Admin Home
    public function getHome(){
        $Products = Product::latest()->get();
        return view('admin.product.index' , compact('Products'));
    }
    //Add
    public function getNew(){
        $AllCategories = Category::latest()->get();
        $id = DB::select("SHOW TABLE STATUS LIKE 'products'");
        $NextProductId= $id[0]->Auto_increment;
        $DiscountsList = Discount::whereDate('valid_until' , '>' , Carbon::today())->get();
        return view('admin.product.new' , compact('AllCategories' , 'NextProductId' , 'DiscountsList'));
    }
    public function postNew(Request $r){
        //Validate the request
        $Rules = [
            'title' => 'required|min:5|max:255',
            'model_number' => 'required',
            'slug' => 'required|min:5|max:255|unique:products',
            'description' => 'required|min:20',
            'body' => 'required|min:30',
            'id' => 'required|integer',
            'price' => 'required|numeric',
            'inventory' => 'required|numeric',
            'weight' => 'numeric',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'image' => 'nullable|image|max:45000000'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all())->withInput();
        }else{
            //Prepare The Data For Uploading
            $ProductData = $r->except('custom_tags');
            //Handle The Image
            if($r->has('image')){
                $ProductData['image'] = $r->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/products' , $ProductData['image']);
            }else{
                $ProductData['image'] = 'product.png';
            }
            $ProductData['slug'] = strtolower(str_replace(' ' , '-' , $r->slug));
            $ProductData['is_promoted'] = ($r->is_promoted == 'on') ? 1 : 0;
            $ProductData['user_id'] = auth()->user()->id;
            $NewProduct = Product::create($ProductData);
            return redirect()->route('admin.products.home')->withSuccess('Product Created Successfully !');
        }
    }
    //Edit
    public function getEdit($id){
        $ProductData = Product::findOrFail($id);
        $AllCategories = Category::latest()->get();
        $ReadyToUseTagsArray = $this->getAllTags();
        $DiscountsList = Discount::whereDate('valid_until' , '>' , Carbon::today())->get();
        return view('admin.product.edit' , compact('ProductData' ,'AllCategories' , 'ReadyToUseTagsArray' , 'DiscountsList'));
    }
    public function postEdit(Request $r , $id){
        $TheProduct = Product::find($id);
        //Validate the request
        $Rules = [
            'title' => 'required|min:5|max:255',
            'model_number' => 'required',
            'description' => 'required|min:20',
            'body' => 'required|min:30',
            'id' => 'required|integer',
            'price' => 'required|numeric',
            'inventory' => 'required|numeric',
            'weight' => 'numeric',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'image' => 'image|max:45000000'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all())->withInput();
        }else{
            //Prepare The Data For Uploading
            $ProductData = $r->except('custom_tags');
            //Handle The Image
            if($r->has('image')){
                $ProductData['image'] = $TheProduct->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/products' , $ProductData['image']);
            }else{
                $ProductData['image'] = $TheProduct->image;
            }
            $ProductData['is_promoted'] = ($r->is_promoted == 'on') ? 1 : 0;
            $ProductData['user_id'] = auth()->user()->id;
            $TheProduct->update($ProductData);
            return redirect()->route('admin.products.home')->withSuccess('Product Updated Successfully !');
    }}
    //Delete
    public function delete(Request $r){
        Product::findOrFail($r->item_id)->delete();
        return response('Product Deleted');
    }
    //Upload Gallery Images
    public function uploadGalleryImages(Request $r){
        //Validate the Request
        $Rules = [
            'image' => 'required|image|max:45000000',
            'product_id' => 'required'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return response($validator->errors()->first());
        }else{
            //Store the image in the file system
            $ImageName = $r->product_id.'-'.rand(1,999).'.'.$r->image->getClientOriginalExtension();
            $r->image->storeAs('images/products/gallery' , $ImageName);
            //Upload to the database
            Product_Image::create([
                'product_id' => $r->product_id,
                'image' => $ImageName
            ]);
            return response('Image Uploaded');
        }
    }
    //Variations Control
    public function getVariations($id){
      $TheProduct = Product::find($id);
      $CurrentVariations = Product_Variation::where('product_id' , $id)->get();
      return view('admin.product.variations' , compact('TheProduct' , 'CurrentVariations'));
    }
    public function postVariations(Request $r , $id){
      //Validate the Request
      $Rules = [
        'color' => 'required',
        'color_code' => 'required',
        'size' => 'required',
        'inventory' => 'required|numeric',
        'status' => 'required'
      ];
      $Validator = Validator::make($r->all() , $Rules);
      if($Validator->fails()){
        return back()->withErrors($Validator->errors()->all());
      }else{
        //Check if This Variation Exsist
        $ProductModelNumber = Product::find($id)->first()->model_number;
        $CurrentVariations = Product_Variation::where('product_id' , $id)->get();
        $isDupliact = $CurrentVariations->map(function($item) use($r){
          if($item->color == $r->color and $item->size == $r->size and $item->color_code and $r->color_code){
            //Duplicate Entry
            $item->update([
              'inventory' => $item->inventory + $r->inventory,
              'status' => $r->status
            ]);
            return 'updated';
          }
        });
        if($isDupliact->contains('updated')){
          return back()->withSuccess("Variation Updated");
        }else{
          $VariationData = $r->all();
          $VariationData['product_id'] = $id;
          $VariationData['ref_code'] = $ProductModelNumber.'_'.strtolower($r->color).'_'.$r->size;
          Product_Variation::create($VariationData);
          return back()->withSuccess('Variation Added Successfully');
        }
      }
    }
    public function deleteVariations($id){
      Product_Variation::findOrFail($id)->delete();
      return back()->withSuccess('Variation Deleted Successfully');
    }
    // ============== Non-Admin Routes ================
    //Home (shop)
    public function getAll(Request $r){
        $FiltersCode = '';
        if($r->has('category_filters') && !empty($r->category_filters) && $r->category_filters != null){
            $TheCategory = Category::where('slug' , $r->category_filters)->first();
            $FiltersCode = "->where('category_id' , \$TheCategory->id)";
        }
        if($r->has('season_filters') && !empty($r->season_filters) && $r->season_filters != null){
            $Season = $r->season_filters;
            $FiltersCode = $FiltersCode . "->where('season' , \$Season)";
        }
        if($r->has('gender_filters') && !empty($r->gender_filters) && $r->gender_filters != null){
            $Gender = $r->gender_filters;
            $FiltersCode = $FiltersCode . "->where('gender' , \$Gender)";
        }
        $Query = '$Products = App\Product::orderBy("id" , "desc")'.$FiltersCode.'->get();';
        eval($Query);
        //Must Use Vars
        $Categories = Category::latest()->get();
        $FiltersList = $this->getAllTags();
        return view('products.all' , compact('Categories' , 'FiltersList' , 'Products' ));
    }
    public function getWithFilter($Category){
        $TheCategory = Category::where('slug' , $Category)->first();
        $Categories = Category::latest()->get();
        $FiltersList = $this->getAllTags();
        $Products = Product::where('category_id' , $TheCategory->id)->latest()->get();
        return view('products.index' , compact('Categories' , 'FiltersList' , 'Products'));

    }
    public function getSingle($slug,$id){
        $TheProduct = Product::findOrFail($id);
        return view('products.single' , compact('TheProduct'));
    }
    public function askQuestion(Request $r){
        //Validate the request
        $Rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'country' => 'required',
            'message' => 'required'
        ];
        $Messages = [
            'name.required' => 'Your name is required !',
            'email.email' => 'Your Email is invalid !',
            'email.required' => 'Your email is required !',
            'phone_number.required' => 'Your number is required !',
            'country.required' => 'Your country is required !',
            'message.required' => 'Your message is required !',
        ];
        $validator = Validator::make($r->all() , $Rules ,$Messages);
        if($validator->fails()){
            return response($validator->errors()->all() , 403);
        }else{
            //Send Message to The Admin
            Mail::to('admin@ukfashioshop.com')->send(new QuestionAboutProduct($r->all()));
            return response("Your Question was recived m you'll hear from us soon");
        }
    }
}
