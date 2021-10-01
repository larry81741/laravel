@extends('layouts.template')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/hw1.css') }}">
@endsection
@section('main')
    <section>
        <div class="title container">
            <div class="icon-block">
                <img class="title-icon" src="https://www.taiwan.net.tw/att/topTitleImg/21_0001001.svg" alt="">
                <h2>最新消息</h2>
            </div>
            <div class="data">
                <span>資料總筆數：<p>2</p></span>
                <span>每頁筆數：<p>10</p></span>
                <span>總頁數：<p>1</p></span>
                <span>目前頁次：<p>1</p></span>
            </div>
        </div>
        <div class="imformation container">
            <img src="https://www.taiwan.net.tw/pic.ashx?qp=/0040115/13_0040115.jpg&sizetype=2" alt="">
            <div class="imformation-text">
                <span>最新消息</span>
                <a href=""><h3>經典小鎮升級3.0正式開跑　小鎮逗鎮趣 集章抽好禮</h3></a>
                <span>2021-05-03</span>
                <p>為推動「小鎮漫遊」，交通部觀光局於108年配合「小鎮漫遊年」遴選40個特色小鎮，109年延續小鎮熱潮，配合「脊梁山脈旅遊年」遴選出30個經典/山城小鎮，今（110）年配合「自行車旅遊年」遴選出30個經典/自行車小鎮，邀請大家慢騎自行車小鎮，領略小鎮在地之美。 交通部觀光局張錫聰局長表示，為</p>
            </div>
        </div>
    </section>

@endsection

@section('js')

@endsection
