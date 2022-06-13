@extends('layouts.app')
@section('css')
@endsection
@section('main')
    <div class="container">
        <a href="/admin/news/create" class="btn btn-success">新增最新消息</a>
        <hr>
        <div class="d-flex align-items-center justify-content-around mb-3">
            <div class="input-group  d-flex  ">
                <span class="input-group-text" id="inputGroup-sizing-default">標題</span>
                <input type="text" class="form-control" id="title" aria-label="Sizing example input"
                    style="max-width: 300px" value="">
            </div>
            <button type="button" class="btn btn-primary" style="width: 100px" onclick="select_manage()">查詢</button>
        </div>
        <div class="ms-auto mb-2 d-flex  align-items-center justify-content-end">
            <label for="display-count" class="label-name mb-0">顯示筆數</label>
            <select class="form-select ps-2" aria-label="Default select example" style="width: 100px"
                onchange="select_manage()" id="display-count">
                <option selected>10</option>
                <option>20</option>
                <option>30</option>
            </select>
        </div>

        <table id="" class="table table-striped">
            <thead>
                <tr>
                    <th>標題</th>
                    <th>日期</th>
                    <th>圖片</th>
                    <th>內文</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody id="listWithHandle">
                {{-- @foreach ($newsData as $news)
                    <tr>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->date }}</td>
                        <td><img src="{{ asset($news->img) }}" width="200" alt=""></td>
                        <td>{{ $news->content }}</td>
                        <td>
                            <a href="/admin/news/edit/{{ $news->id }}" class="btn btn-primary">編輯</a>
                            <form action="/admin/news/delete/{{ $news->id }}" method='POST'>
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger delete-btn" onclick="isdelete(this)">刪除</button>
                            </form>
                        </td>

                    </tr>
                @endforeach --}}

            </tbody>
        </table>
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
    </div>
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
            const countvalue = document.querySelector('#display-count').value;
            const tabledata = document.querySelector('#listWithHandle');
            const titlevalue = document.querySelector('#title').value;
            let tmptabledata = "";
            // tabledata.innerHTML = "";
            let selectData = new FormData()
            selectData.append('currect_page', el);
            selectData.append('length', countvalue);
            selectData.append('_token', '{{ csrf_token() }}');
            selectData.append('title', titlevalue);

            fetch('/admin/news/filter', {
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
                        <tr>
                            <td>${data.title}</td>
                            <td>${data.date}</td>
                            <td><img src="${data.img}" width="200" alt=""></td>
                            <td>${data.content}</td>
                            <td>
                                <a href="/admin/news/edit/${data.id}" class="btn btn-primary">編輯</a>
                                <form action="/admin/news/delete/${data.id}" method='POST'>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger delete-btn" onclick="isdelete(this)">刪除</button>
                                </form>
                                <a href="/admin/news/content/${data.id}" class="btn btn-success">檢視報名情況</a>
                            </td>
                        </tr>
                        `
                    });
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
    <script>
        function isdelete(newsid) {
            Swal.fire({
                title: '確定刪除嗎?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '確定!',
                cancelButtonText: '取消'
            }).then((result) => {
                if (result.isConfirmed) {
                    newsid.parentElement.submit();
                }
            })
        }
    </script>
@endsection
