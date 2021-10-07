<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $newsData = News::get();
        return view('news.hw1', compact('newsData'));
    }

    public function create()
    {
        return view('news.create_news');

    }

    public function delete($id)
    {
        News::find($id)->delete();
        return redirect('/news');
    }
    public function store(Request $request)
    {
        //取得資料
        // dd($request->all());
        //儲存資料
        News::create([
            'title'=>$request->title,
            'date'=>$request->date,
            'img'=>$request->img,
            'content'=>$request->content,
        ]);
        // 欄位名稱與資料庫相同時-->    News::create($request->all());
        return redirect('/news');
    }
    public function edit($id)
    {
        $news =News::find($id);
        return view('news.edit_news',compact('news'));
    }
    public function update($id,Request $request)
    {
        News::find($id)->update($request->all());
        return redirect('/news');
    }


    public function detail($id)
    {

        $newsDetail = News::find($id);
        if ($newsDetail == null) {
            return redirect('news');
        } else {
            return view('/test', compact('newsDetail'));
        }
    }
}
