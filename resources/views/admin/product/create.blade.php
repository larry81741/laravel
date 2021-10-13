@extends('layouts.template');
@section('css')

@endsection
@section('main')
    <div class="container" class="p-5">
        <form action="/admin/product/store" method='POST' class="mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="type">類型</label>
                <input type="text" id="type" name="type">
            </div>
            <div class="form-group">
                <label for="name">名稱</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">內容</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="img">圖片</label>
                <input type="file" accept="image/*" id="img" name="img" required>
            </div>
            <div class="form-group">
                <label for="price">價格</label>
                <input type="number" id="price" name="price">
            </div>
            <button type="submit">送出</button>
        </form>
    </div>

@endsection
@section('js')

@endsection
