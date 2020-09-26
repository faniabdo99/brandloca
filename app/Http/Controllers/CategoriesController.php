<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Category;
class CategoriesController extends Controller{
    public function getHome(){
        $Categories = Category::latest()->get();
        return view('admin.category.index' , compact('Categories'));
    }
    public function getNew(){
        return view('admin.category.new');
    }
    public function postNew(Request $r){
        $Rules = [
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255|unique:categories',
            'image' => 'image',
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all())->withInput();
        }else{
            //Handle the image upload
            if($r->has('image')){
                $imageName = $r->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/categories' , $imageName);
            }else{
                $imageName = 'category.png';
            }
            //Upload to DB
            $CategoryData = $r->all();
            $CategoryData['image'] = $imageName;
            $NewCat = Category::create($CategoryData);
            return redirect()->route('admin.categories.home')->withSuccess('Category '.$NewCat->title.' Created Successfully');
        }
    }
    //Edit
    public function getEdit($id){
        $Category = Category::findOrFail($id);
        return view('admin.category.edit' , compact('Category'));
    }
    public function postEdit(Request $r , $id){
        $Category = Category::findOrFail($id);
        if($Category !=null){
            $Rules = [
                'title' => 'required|min:5|max:255',
                'image' => 'image',
            ];
            $validator = Validator::make($r->all() , $Rules);
            if($validator->fails()){
                return back()->withErrors($validator->errors()->all())->withInput();
            }else{
                //Handle the image upload
                if($r->has('image')){
                    $imageName = $Category->slug.'.'.$r->image->getClientOriginalExtension();
                    $r->image->storeAs('images/categories' , $imageName);
                }else{
                    $imageName = 'category.png';
                }
                //Upload to DB
                $CategoryData = $r->all();
                $CategoryData['image'] = $imageName;
                $Category->update($CategoryData);
                return redirect()->route('admin.categories.home')->withSuccess('Category Updated Successfully');
            }
        }else{
            abort(404);
        }
    }
    //Delete
    public function delete(Request $r){
        Category::findOrFail($r->item_id)->delete();
        return response('Category Deleted');
    }
}
