@extends('layouts.app')

@section('css')
@endsection

@section('main')
    <div class="container" class="p-5">
        <div class="input-group mb-3">
            <span for="title" class="input-group-text">標題</span>
            <input type="text" id="title" name="title" value="{{ $news->title }}" readonly>
        </div>
        <div class="input-group mb-3">
            <span for="date" class="input-group-text">時間</span>
            <input type="date" id="date" name="date" value="{{ $news->date }}" readonly>
        </div>
        <div class="input-group mb-3">
            <span for="img" class="input-group-text">圖片</span>
            <img id="blah" src="{{ $news->img }}" alt="" width="600" />
        </div>
        <div class="input-group mb-3">
            <span for="content" class="input-group-text">內容</span>
            <textarea name="content" id="content" cols="30" rows="10" readonly>{{ $news->content }}</textarea>
        </div>
        <a href="/news/content/{{ $news->id }}/create" class="btn btn-primary">報名</a>
    </div>
@endsection

@section('js')
@endsection
