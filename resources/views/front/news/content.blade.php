@extends('layouts.template')

@section('css')
@endsection

@section('main')
    <div>{{ $newsDetail->id}}</div>
    <div>{{ $newsDetail->title }}</div>
    <div>{{ $newsDetail->img }}</div>
    <div>{{ $newsDetail->date }}</div>
@endsection

@section('js')
@endsection
