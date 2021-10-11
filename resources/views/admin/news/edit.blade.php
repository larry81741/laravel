@extends('layouts.template');
@section('css')

@endsection
@section('main')
    <div class="container" class="p-5">
        <form action="/admin/news/update/{{$news->id}}" method='POST' class="mx-auto">
            @csrf
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" id="title" name="title" value="{{$news->title}}">
            </div>
            <div class="form-group">
                <label for="date">時間</label>
                <input type="date" id="date" name="date" value="{{$news->date}}">
            </div>
            <div class="form-group">
                <label for="img">圖片</label>
                <img src="{{$news->img}}" alt="" width="220">
                <input type="text" id="img" name="img" value="{{$news->img}}">
            </div>
            <div class="form-group">
                <label for="content">內容</label>
                <textarea name="content" id="content" cols="30" rows="10">{{$news->content}}</textarea>
            </div
           
        </form>
        <button type="submit" class="btn btn-primary">修改</button>
    </div>
@endsection
@section('js')

@endsection