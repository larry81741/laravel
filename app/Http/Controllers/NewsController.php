<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        $newsData=News::get();
        return view('admin.news.index',compact('newsData'));
    }
    //
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {

        $requsetData=$request->all();

        if( $request->hasFile('img')){
            $file=$request->file('img');
            $path=$this->fileUpload($file,'product');
            $requsetData['img']=$path;
        }
        News::create($requsetData);
        return redirect('admin/news');
    }
    //
    public function edit($id)
    {
        $news=News::find($id);
        return view('admin.news.edit',compact('news'));
    }

    //
    public function update($id,Request $request)
    {
        News::find($id)->update($request->all());
        return redirect('/admin/news');
    }
    public function delete($id)
    {
        News::find($id)->delete();
        return redirect('/admin/news');
    }





}
