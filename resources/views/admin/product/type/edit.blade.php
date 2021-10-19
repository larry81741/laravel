@extends('layouts.template');
@section('css')

@endsection
@section('main')
    <div class="container" class="p-5">
        <form action="/admin/product/type/update/{{$productType->id}}" method='POST' class="mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">名稱</label>
                <input type="text" id="name" name="name" value="{{$productType->name}}">
            </div>
            <button type="submit">送出</button>
        </form>
    </div>

@endsection
@section('js')

@endsection
