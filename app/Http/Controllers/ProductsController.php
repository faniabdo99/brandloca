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
            $ProductData = $r->all();
            //Handle The Image
            if($r->has('image')){
                $ProductData['image'] = $r->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/products' , $ProductData['image']);
            }else{
                $ProductData['image'] = 'product.png';
            }
            $ProductData['slug'] = str_replace(' ' , '-' , $r->slug);
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
        $ProductModelNumber = Product::find($id)->model_number;
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
    public function ApplyFilters(Request $r){
      $Filters = '';
      if($r->has('category') && $r->category){
        $TheCategory = Category::where('slug' , $r->category)->first();
        $Categories = Category::latest()->get();
        $Filters .= "->where('category_id' , $TheCategory->id)";
      }
      if($r->size && $r->size != null){
        $Filters .= "->where('size' , '$r->size')";
      }
      if($r->season && $r->season != null){
        $Filters .= "->where('season' , '$r->season')";
      }
      if($r->type && $r->type != null){
        $Filters .= "->where('type' ,'$r->type')";
      }
      if($r->category_id && $r->category_id != null){
        $Filters .= "->where('category_id' ,'$r->category_id')";
      }
      $Query = "\$Products = App\Product::where('status' , '!=' , 'Invisible')".$Filters."->latest()->get();";
      eval($Query);
      return $Products->pluck('id')->toArray();
    }
    //Home (shop)
    public function getAll(Request $r){
        $Categories = Category::latest()->get();
        $Products = Product::where('status' , '!=' , 'Invisible')->latest()->limit(9)->get();
        return view('products.all' , compact('Categories' , 'Products'));
    }
    public function getCategoryAll($Category){
      $TheCategory = Category::where('slug' , $Category)->first();
      $Categories = Category::latest()->get();
      $Products = Product::where('category_id' , $TheCategory->id)->where('status' , '!=' , 'Invisible')->latest()->limit(9)->get();
      $AvailableSizes = $Products->pluck('size')->unique();
      $AvailableSeasons = $Products->pluck('season')->unique();
      $AvailableTypes = $Products->pluck('type')->unique();
      return view('products.category' , compact('Products' , 'Categories' , 'AvailableSizes' , 'AvailableSeasons','AvailableTypes'));
    }
    public function getSizeAll($Size){
      $Categories = Category::latest()->get();
      $Products = Product::where('size' , $Size)->where('status' , '!=' , 'Invisible')->latest()->limit(9)->get();
      $AvailableCategories = $Products->pluck('category_id')->unique();
      $AvailableSeasons = $Products->pluck('season')->unique();
      $AvailableTypes = $Products->pluck('type')->unique();
      return view('products.size' , compact('Products' , 'Categories' , 'AvailableCategories' , 'AvailableSeasons','AvailableTypes'));
    }
    public function getSeasonAll($Season){
      $Categories = Category::latest()->get();
      $Products = Product::where('season' , $Season)->where('status' , '!=' , 'Invisible')->latest()->get();
      $AvailableSizes = $Products->pluck('size')->unique();
      $AvailableCategories = $Products->pluck('category_id')->unique();
      $AvailableTypes = $Products->pluck('type')->unique();
      return view('products.season' , compact('Products' , 'Categories' , 'AvailableSizes' , 'AvailableCategories','AvailableTypes'));
    }
    public function getTypeAll($Type){
      $Categories = Category::latest()->get();
      $Products = Product::where('type' , $Type)->where('status' , '!=' , 'Invisible')->latest()->limit(9)->get();
      $AvailableSizes = $Products->pluck('size')->unique();
      $AvailableCategories = $Products->pluck('category_id')->unique();
      $AvailableSeasons = $Products->pluck('season')->unique();
      return view('products.type' , compact('Products' , 'Categories' , 'AvailableSizes' , 'AvailableCategories','AvailableSeasons'));
    }
    public function searchProducts(Request $r){
      $Categories = Category::latest()->get();
      $Products = Product::where('title' , 'like' , "%$r->search_term%")->where('status' , '!=' , 'Invisible')->latest()->limit(9)->get();
      return view('products.all' , compact('Products','Categories'));
    }
    public function filterProductsList(Request $r){

    }
    public function getSingle($slug,$id){
        $TheProduct = Product::findOrFail($id);
        $RelatedProducts = Product::where([
          ['status' , 'Available'],
          ['category_id' , $TheProduct->category_id],
          ['season' , $TheProduct->season],
          ['type' , $TheProduct->type],
          ['id', '!=', $TheProduct->id]
        ])->limit(8)->get();
        if($TheProduct->status == 'Invisible'){
          abort(404);
        }
        return view('products.single' , compact('TheProduct','RelatedProducts'));
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
