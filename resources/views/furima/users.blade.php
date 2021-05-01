@extends('layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal-default-theme.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
@endsection

@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/l10n/ja.js" defer></script>
<script src="{{ asset('js/top.js')}}" defer></script>
@endsection

@section('title')
    furimaサイトUSER一覧
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">氏名</th>
                <th scope="col">Email</th>
                <th scope="col">売上金額</th>
                <th scope="col">seller_id</th>
                <th scope="col">商品説明</th>
                <th scope="col">商品価格</th>
                <th scope="col">商品の販売ステータス</th>
            </tr>
        </thead>
        <tbody class="table-stripes-row-tbody">
        @foreach ($furima_users as $furima_user)
            <tr>
                <td>{{$furima_user->id}}</td>
                <td>{{$furima_user->name}}</td>
                <td>{{$furima_user->email}}</td>
                <td>{{$furima_user->sales}}</td>
                <td>{{$furima_user->seller_id}}</td>
                <td>{{$furima_user->description}}</td>
                <td>{{$furima_user->price}}</td>
                <td>{{$furima_user->state}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
