@extends('layouts/app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('main')
    <div class="container">
        <a href="/admin/news/create" class="btn btn-success">新增最新消息</a>
        <hr>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>標題</th>
                    <th>日期</th>
                    <th>圖片</th>
                    <th>內文</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsData as $news)
                    <tr>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->date }}</td>
                        <td><img src="{{asset($news->img)}}" alt=""></td>
                        <td>{{ $news->content }}</td>
                        <td>
                            <a href="/admin/news/edit/{{ $news->id }}" class="btn btn-primary">編輯</a>
                            <button class="btn btn-danger delete-btn" onclick="if(confirm('刪除?'))document.querySelector('#delete_{{ $news->id }}').submit();">刪除</button>
                            <form id="delete_{{ $news->id }}" action="/admin/news/delete/{{ $news->id }}"
                                method="POST" class="d-none">
                                @csrf
                            </form>
                        </td>

                    </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    {{-- <script>
        document.querySelectorAll('.delete-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                if (confirm('刪除?')) {
                    document.querySelector(id).submit();
                }
            })
        })
    </script> --}}
@endsection
