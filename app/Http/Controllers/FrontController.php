<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsDetail;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function newsIndex(){
        $newsData=News::with("news_detail")->get();
        return view('front.news.index',compact('newsData'));
    }
    public function filter(Request $request)
    {

        $data = News::Query();
        $currect_page = 1; //初始頁數
        $length = $request->length??10; //顯示幾筆
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
    public function newsContent($id){
        $news=News::find($id);
        return view('front.news.content',compact('news'));
    }
    public function newsDetailCreate($id){
        return view('front.news.create',compact("id"));
    }
    public function newsDetailStore(Request $request,$id){
        NewsDetail::create([
            "name"=>$request->name,
            "new_id"=>$id,
            "phone"=>$request->phone,
            "mail"=>$request->mail,
        ]);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'activity'=>News::find($id)->title
        ];
        \Mail::to($request->mail)->send(new \App\Mail\SignUpMail($data));
        return redirect("/news")->with("success","報名成功");
    }
}
