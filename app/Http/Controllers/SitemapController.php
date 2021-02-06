<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Blog;
class SitemapController extends Controller{
    public function getSitemap(){
        $AllCategories = Category::latest()->get();
        $AllProducts = Product::latest()->get();
        $AllArticles = Blog::latest()->get();
        return response()->view('sitemap.main',compact('AllCategories','AllProducts','AllArticles'))->header('Content-Type', 'text/xml');
    }
}
