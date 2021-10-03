@extends('layouts.template')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/hw1.css') }}">
@endsection
@section('main')
    <section>
        <div class="title container">
            <div class="icon-block">
                <img class="title-icon" src="{{ $newsData[0]->img }}" alt="">
                <h2>最新消息</h2>
            </div>
            <div class="data">
                <span>資料總筆數：<p>2</p></span>
                <span>每頁筆數：<p>10</p></span>
                <span>總頁數：<p>1</p></span>
                <span>目前頁次：<p>1</p></span>
            </div>
        </div>


        @foreach ($newsData as $news)
            <div class="imformation container">
                <img src="{{ $news->img }}" alt="">
                <div class="imformation-text">
                    <span>最新消息</span>
                    <a href="/news/detail/{{$news->id}}">
                        <h3>{{ $news->title }}</h3>
                    </a>
                    <span>{{ $news->date }}</span>
                    <p>{{ $news->content }}</p>
                </div>
            </div>
        @endforeach

    </section>

@endsection

@section('js')

@endsection
