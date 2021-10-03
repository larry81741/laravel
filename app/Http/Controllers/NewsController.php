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
        News::create(
            [
                'title' => 'asd',
                'date' => '2021-05-05',
                'img' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSB_lpjTSZzRSWUMhUH6XPZ0VWseidGXdIRnQ&usqp=CAU',
                'content' => 'asdqwe',
                'views' => 0
            ]
        );
    }
    public function update($id)
    {
        News::where('id', $id)->update(['title' => "test test"]);
    }
    public function delete($id)
    {
        News::where('id', $id)->delete();
    }


    public function detail($id)
    {

        $newsDetail = News::find($id);
        if ($newsDetail == null) {
            return redirect('news');
        } else {
            return view('test', compact('newsDetail'));
        }
    }
}
