@extends('layouts.template');
@section('css')

@endsection
@section('main')
    <div class="container" class="p-5">
        <form action="/admin/product/update/{{$product->id}}" method='POST' class="mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">類型</label>
                <input type="text" id="title" name="title" value="{{$product->title}}">
            </div>
            <div class="form-group">
                <label for="name">名稱</label>
                <input type="text" id="name" name="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="description">簡介</label>
                <textarea name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="img">圖片</label>
                <img src="{{asset($product->img)}}"width="200" alt="">
                <input type="file" accept="image/*" id="img" name="img">
            </div>
            <div class="form-group">
                <label for="price">價格</label>
                <input type="number" id="price" name="price" value="{{$product->price}}">
            </div>
            <button type="submit">送出</button>
        </form>
    </div>

@endsection
@section('js')

@endsection
