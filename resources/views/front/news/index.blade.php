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
                <span><a href="/news/create">新建</a></span>
            </div>
        </div>


        @foreach ($newsData as $news)
            <div class="imformation container">
                <img src="{{ $news->img }}" alt="">
                <div class="imformation-text">
                    <span>最新消息</span>
                    <div class="">                    
                        <a class=" btn btn-primary"
                        href="/news/edit/{{ $news->id }}">編輯</a>
                        <button class="delete  btn btn-danger" data-href="/news/delete/{{ $news->id }}">刪除</button>
                    </div>

                    <a href="/news/detail/{{ $news->id }}">
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
    <script>
        var delbtns = document.querySelectorAll('.delete');
        delbtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                if (confirm("刪除?")==true){
                    var id = this.getAttribute('data-id');
                    console.log(id);
                    location.href=this.getAttribute('data-href');;

                }
            })
        })
    </script>
@endsection
