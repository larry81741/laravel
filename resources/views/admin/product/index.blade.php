@extends('layouts/app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('main')
    <div class="container">
        <a href="/admin/product/create" class="btn btn-success">新增產品</a>
        <hr>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>類型</th>
                    <th>名稱</th>
                    <th>簡介</th>
                    <th>圖片</th>
                    <th>價格</th>
                    <th width="150">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="{{asset($product->img)}}" alt="" width="200"></td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="/admin/news/edit/{{ $product->id }}" class="btn btn-primary">編輯</a>
                            <button class="btn btn-danger delete-btn" onclick="if(confirm('刪除?'))document.querySelector('#delete_{{ $product->id }}').submit();">刪除</button>
                            <form id="delete_{{ $product->id }}" action="/admin/news/delete/{{ $product->id }}"
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
