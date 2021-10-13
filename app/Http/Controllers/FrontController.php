<?php

namespace App\Http\Controllers;

use App\News;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function newsIndex(){
        $newsData=News::get();
        return view('front.news.index',compact('newsData'));
    }
    public function newsContent($id){
        $newsData=News::find($id);
        return view('front.news.content',compact('newsData'));
    }

    public function productIndex(){
        $products=Product::get();
        return view('front.product.index',compact('products'));
    }
    public function productContent($id){
        $products=Product::find($id);
        return view('front.product.content',compact('products'));
    }
}
