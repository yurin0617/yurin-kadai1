@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<main>
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>詳細</h2>
        </div>
    </div>
    <div>{{ $contact->last_name }}</div>
    <div>{{ $contact->first_name }}</div>
    @if($contact->gender == 1) 男性
    @elseif($contact->gender == 2) 女性
    @else その他 @endif
    <div>{{ $contact->email }}</div>
    <div>{{ $contact->tel }}</div>
    <div>{{ $contact->address }}</div>
    <div>{{ $contact->building }}</div>
    {{ optional($contact->category)->content ?? '未設定' }}
    <div>{{ $contact->detail }}</div>
    @foreach($channels as $channel)
    <div>{{ $channel->content }}</div>
    @if(!$loop->last), @endif @endforeach
    <div>@if($contact->image_file)
        <img src="{{ asset('storage/' . $contact->image_file) }}">
        @else
        <p>画像はアップロードされていません</p>
        @endif
    </div>

</main>
@endsection