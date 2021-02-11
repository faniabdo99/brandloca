<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Blog;
class BlogController extends Controller{
    public function getHome(){
        $Blogs = Blog::latest()->get();
        return view('admin.blog.index',compact('Blogs'));
    }
    public function getNew(){
        return view('admin.blog.new');
    }
    public function postNew(Request $r){
        //Validate request 
        $Rules = [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|image'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all());
        }else{
            $BlogData = $r->all();
            if($r->has('image')){
                $BlogData['image'] = $r->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/blog' , $BlogData['image']);
            }
            $BlogData['user_id'] = auth()->user()->id;
            Blog::create($BlogData);
            return redirect()->route('admin.blog.home')->withSuccess('Article Added Successfully');
        }
    }
    public function getEdit($id){
        $TheBlog = Blog::findOrFail($id);
        return view('admin.blog.edit' , compact('TheBlog'));
    }
    public function postEdit(Request $r , $id){
        //Validate request 
        $Rules = [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'content' => 'required'
        ];
        $validator = Validator::make($r->all() , $Rules);
        if($validator->fails()){
            return back()->withErrors($validator->errors()->all());
        }else{
            $BlogData = $r->all();
            if($r->has('image')){
                $BlogData['image'] = $r->slug.'.'.$r->image->getClientOriginalExtension();
                $r->image->storeAs('images/blog' , $BlogData['image']);
            }
            $BlogData['user_id'] = auth()->user()->id;
            Blog::findOrFail($id)->update($BlogData);
            return redirect()->route('admin.blog.home')->withSuccess('Article Updated Successfully');
        }
    }
    public function delete(Request $r){
        Blog::findOrFail($r->item_id)->delete();
        return response('Article Deleted Successfully' , 200);
    }
    //Non-admin route
    public function getFrontendHome(){
        $Blogs = Blog::where('published' , 1)->latest()->paginate(6);
        return view('blog.index', compact('Blogs'));
    }
    public function getSingle($id){
        $TheBlog = Blog::findOrFail($id);
        if(!$TheBlog){abort(404);}
        return view('blog.single' , compact('TheBlog'));
    }
}
