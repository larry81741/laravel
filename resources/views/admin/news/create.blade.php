@extends('layouts.app')
@section('css')
@endsection
@section('main')
    <div class="container" class="p-5">
        <form action="/admin/news/store" method='POST' class="mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">標題</label>
                <input type="text" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="date">時間</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="img">圖片</label>
                <input type="file" name="img"
                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                <img id="blah" alt="" width="600" />
            </div>
            <div class="form-group">
                <label for="content">內容</label>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">送出</button>
        </form>
    </div>
@endsection
@section('js')
@endsection
