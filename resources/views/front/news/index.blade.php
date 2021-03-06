@extends('layouts.app')


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
            <div class="data" id="datainfor">
                <span>資料總筆數：<p>2</p></span>
                <span>每頁筆數：<p>10</p></span>
                <span>總頁數：<p>1</p></span>
                <span>目前頁次：<p>1</p></span>
            </div>
        </div>

        <div id="listWithHandle">
            @foreach ($newsData as $news)
                <div class="imformation container">
                    <img src="{{ $news->img }}" alt="">
                    <div class="imformation-text">
                        <span>最新消息</span>
                        <a href="/news/detail/{{ $news->id }}">
                            <h3>{{ $news->title }}</h3>
                        </a>
                        <span>{{ $news->date }}</span>
                        <p>{{ $news->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <nav aria-label="Search results pages" class="pagination-box d-flex justify-content-center">
            <ul class="pagination" onclick="paginate(event)">
                <li class="page-item">
                    <div class="page-link" href="#">1</div>
                </li>
                <li class="page-item active" aria-current="page">
                    <div class="page-link" href="#">2 </div>
                </li>
                <li class="page-item">
                    <div class="page-link" href="#">3</div>
                </li>
            </ul>
        </nav>
    </section>
@endsection

@section('js')
<script>
            select_manage()
        function paginate(e) {
            let el = Number(e.target.dataset.page);
            select_manage(el);
        }
        function select_manage(el = null) {
            const pagination = document.querySelector('.pagination')
            const tabledata = document.querySelector('#listWithHandle');
            const datainfor=document.querySelector('#datainfor');
            let tmptabledata = "";
            // tabledata.innerHTML = "";
            let selectData = new FormData()
            selectData.append('currect_page', el);
            selectData.append('_token', '{{ csrf_token() }}');
            fetch('/news/filter', {
                    method: 'POST',
                    body: selectData,
                }).then(function(response) {
                    return response.json(); //接收資料
                })
                .then(function(datas) {
                    let number = ""
                    const paginate = paginationNum(datas.currectPage, datas.totalPage);
                    paginate.forEach(item => {
                        if (item == datas.currectPage) {
                            number +=
                            `<li class="page-item active">
                                <div class="page-link" data-page="${item}">${item}</div>
                            </li>`
                        } else {
                            number +=
                            `<li class="page-item">
                                <div class="page-link" data-page="${item}">${item}</div>
                            </li>`
                        }
                    })
                    datas.data.forEach(data => {
                        tmptabledata +=
                        `
                        <div class="imformation container">
                    <img src="${data.img}" alt="">
                    <div class="imformation-text">
                        <span>最新消息</span>
                        <a href="/news/content/${data.id}">
                            <h3>${data.title}</h3>
                        </a>
                        <span>${data.date}</span>
                        <p>${data.content}</p>
                    </div>
                </div>
                        `
                    });
                    datainfor.innerHTML=`
                <span>資料總筆數：<p>${datas.totalDisplayRecords}</p></span>
                <span>每頁筆數：<p>10</p></span>
                <span>總頁數：<p>${datas.totalPage}</p></span>
                <span>目前頁次：<p>${datas.currectPage}</p></span>
                `
                    tabledata.innerHTML=tmptabledata;
                    pagination.innerHTML =
                    `
                    ${number}
                    `;
                });
        }

        function paginationNum(currentPage, totalPages) {
            let arr = [];
            const show = 2;
            if (totalPages <= 4) {
                for (let i = 1; i <= totalPages; i++) {
                    arr.push(i);
                }
                return arr;
            }

            if (currentPage < show + 1) {
                const temp = show * 2 + 1;
                for (let i = 1; i <= temp; i++) {
                    arr.push(i);
                }
                return arr;
            }

            if (currentPage > totalPages - show) {
                const temp = totalPages - show * 2;
                for (let i = temp; i <= totalPages; i++) {
                    arr.push(i);
                }
                return arr;
            }

            const tempStart = currentPage - show;
            const tempNum = currentPage + show;
            for (let i = tempStart; i <= tempNum; i++) {
                arr.push(i);
            }
            return arr;
        }
    </script>
@endsection
