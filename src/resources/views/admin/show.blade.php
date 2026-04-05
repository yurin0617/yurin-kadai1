@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')
<main>
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>詳細</h2>
        </div>
    </div>
    <div class="form">
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact->last_name }}　{{ $contact->first_name }}
                        </p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <p>@if($contact->gender == 1) 男性
                            @elseif($contact->gender == 2) 女性
                            @else その他 @endif
                        </p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact->email }}</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact->tel }}</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact->address }}</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact->building }}</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        {{ optional($contact->category)->content ?? '未設定' }}
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <p>{{ $contact->detail }}</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">どこで知りましたか？</th>
                    <td class="confirm-table__text">
                        @foreach($channels as $channel)
                        <p>{{ $channel->content }}</p>
                        @if(!$loop->last), @endif @endforeach
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">画像ファイル</th>
                    <td class="confirm-table__text">
                        <p>@if($contact->image_file)
                            <img src="{{ asset('storage/' . $contact->image_file) }}" class="confirm-table__image">
                            @else
                        <p>画像はアップロードされていません</p>
                        @endif
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</main>
@endsection