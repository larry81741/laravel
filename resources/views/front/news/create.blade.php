@extends('layouts.app')
@section('css')
@endsection
@section('main')
    <div class="container" class="p-5">
        <form action="/news/content/{{ $id }}/store" method='POST' class="mx-auto" >
            @csrf
            <div class="input-group mb-3">
                <span for="name" class="input-group-text">姓名</span>
                <input type="text" id="name" name="name" value="" required>
            </div>
            <div class="input-group mb-3">
                <span for="phone" class="input-group-text">電話</span>
                <input type="text" id="phone" name="phone" value=""  required>
            </div>
            <div class="input-group mb-3">
                <span for="mail" class="input-group-text">信箱</span>
                <input type="email" id="mail" name="mail" value="" required>
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
        </form>
    </div>
@endsection
@section('js')
@endsection
