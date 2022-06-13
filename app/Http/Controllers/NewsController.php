<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsDetail;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        $newsData=News::get();
        return view('admin.news.index',compact('newsData'));
    }
    public function filter(Request $request)
    {
        $data = News::Query();

        // 中間下篩選條件
        //基本上進來的條件 關聯表的都會是ID居多 或是字串類(模糊搜尋用)

        $title = $request->title;
        if (isset($title))
            $data->where("title","like", "%$title%");

        //10 25 50 75 100
        //從第幾個開始
        $currect_page = 1; //初始頁數
        $length = $request->length; //顯示幾筆
        $currect_tmp = $request->currect_page; //當前頁數
        $totalRecordswithFilter = $data->count();
        $totalRecordswithFilter % $length==0 ? $totalPageFilter = (intval($totalRecordswithFilter / $length)) : $totalPageFilter = (intval($totalRecordswithFilter / $length) + 1); //總頁數
        if (((int)$currect_tmp != 0) && ((int)$currect_tmp) <= $totalPageFilter) {
            $currect_page = $currect_tmp;
        }
        if (isset($currect_page)) {
            if (isset($length))
                $data->skip(($currect_page - 1) * $length); //從第幾個開始
            else
                $data->skip(($currect_page - 1) * 10);
        }
        if (isset($length))
            $data->take($length);

        $data = $data->get();
        $response = array(
            "currectPage" => intval($currect_page), //目前第幾頁
            "totalPage" => $totalPageFilter, //總共幾頁 (總筆數/顯示筆數)+1
            "totalDisplayRecords" => $totalRecordswithFilter, //經過篩選後總筆數
            "data" => $data //資料
        );
        return $response;
    }
    //
    public function create()
    {
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $tmpimgpath=FilesController::imgUpload($request->img, 'newsimg');
        News::create([
            "title"=>$request->title,
            "date"=>$request->date,
            "content"=>$request->content,
            "img"=>$tmpimgpath,
        ]);
        return redirect('admin/news')->with("success","已成功新增");
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
        $oldpath=News::find($id)->img;
        FilesController::deleteUpload($oldpath);
        $tmpimgpath=FilesController::imgUpload($request->img, 'newsimg');
        News::find($id)->update([
            "title"=>$request->title,
            "date"=>$request->date,
            "content"=>$request->content,
            "img"=>$tmpimgpath,
        ]);
        return redirect('/admin/news')->with("success","已成功更新");
    }
    public function delete(Request $request,$id)
    {
        News::find($id)->delete();
        NewsDetail::where("new_id",$id)->delete();
        return redirect('/admin/news')->with("success","已成功刪除");
    }

    public function content($id)
    {
        return view('admin.news.content',compact('id'));
    }
    public function contentFilter(Request $request,$id)
    {
        $data = NewsDetail::Query()->where("new_id",$id);

        // 中間下篩選條件
        //基本上進來的條件 關聯表的都會是ID居多 或是字串類(模糊搜尋用)

        $name = $request->name;
        if (isset($name))
            $data->where("name","like", "%$name%");

        //10 25 50 75 100
        //從第幾個開始
        $currect_page = 1; //初始頁數
        $length = $request->length; //顯示幾筆
        $currect_tmp = $request->currect_page; //當前頁數
        $totalRecordswithFilter = $data->count();
        $totalRecordswithFilter % $length==0 ? $totalPageFilter = (intval($totalRecordswithFilter / $length)) : $totalPageFilter = (intval($totalRecordswithFilter / $length) + 1); //總頁數
        if (((int)$currect_tmp != 0) && ((int)$currect_tmp) <= $totalPageFilter) {
            $currect_page = $currect_tmp;
        }
        if (isset($currect_page)) {
            if (isset($length))
                $data->skip(($currect_page - 1) * $length); //從第幾個開始
            else
                $data->skip(($currect_page - 1) * 10);
        }
        if (isset($length))
            $data->take($length);

        $data = $data->get();
        $response = array(
            "currectPage" => intval($currect_page), //目前第幾頁
            "totalPage" => $totalPageFilter, //總共幾頁 (總筆數/顯示筆數)+1
            "totalDisplayRecords" => $totalRecordswithFilter, //經過篩選後總筆數
            "data" => $data //資料
        );
        return $response;
    }

}
