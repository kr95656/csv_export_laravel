@extends('layouts.app')

@section('title')
    問い合わせ一覧
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">建築物条件</th>
                <th scope="col">建築物デザイン</th>
                <th scope="col">名前</th>
                <th scope="col">住所</th>
                <th scope="col">電話番号</th>
                <th scope="col">Fax</th>
            </tr>
        </thead>
        <tbody class="table-stripes-row-tbody">
        @foreach ($contacts as $contact)
            <tr>
                <td>{{$contact->id}}</td>
                <td>{{$contact->condition_name}}</td>
                <td>{{$contact->design_name}}</td>
                <td>{{$contact->sur_name}}{{$contact->name}}</td>
                <td>{{$contact->zipcode}}<br{{$contact->pref}}>{{ $contact->city }}{{ $contact->street }} </td>
                <td>{{$contact->tel_number}}</td>
                <td>{{$contact->fax_number}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
