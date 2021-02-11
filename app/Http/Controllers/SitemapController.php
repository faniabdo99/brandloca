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
        $xml_version = '<?xml version="1.0"?>';
        return response()->view('sitemap.main',compact('xml_version','AllCategories','AllProducts','AllArticles'))->header('Content-Type', 'text/xml');
    }
}
