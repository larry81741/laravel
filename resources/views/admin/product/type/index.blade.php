@extends('layouts/app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('main')
    <div class="container">
        <a href="/admin/product/type/create" class="btn btn-success">新增產品類別</a>
        <hr>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>類別名稱</th>
                    <th width="100">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productTypes as $productType)
                    <tr>
                        <td>{{ $productType->id }}</td>
                        <td>{{ $productType->name }}</td>
                        <td>
                            <a href="/admin/product/type/edit/{{ $productType->id }}" class="btn btn-primary">編輯</a>
                            <button class="btn btn-danger delete-btn" onclick="if(confirm('刪除?'))document.querySelector('#delete_{{ $product->id }}').submit();">刪除</button>
                            <form id="delete_{{ $productType->id }}" action="/admin/product/type/delete/{{ $productType->id }}"
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
