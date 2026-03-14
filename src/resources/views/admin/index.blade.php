@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<main>
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Admin</h2>
        </div>
    </div>

    <form class="search-form" action="/admin" method="get">
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" />
            <select name="gender">
                <option value="">性別</option>
                <option value="1" {{ $request->gender == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ $request->gender == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ $request->gender == '3' ? 'selected' : '' }}>その他</option>
            </select>
            <select class="search-form__item-select" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $request->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
            <input type="date" name="date" value="{{ $request->date }}">
        </div>

        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
            <a href="/admin" class="search-form__button-reset">リセット</a>
        </div>
    </form>
    <div class="pagination">
        {{ $contacts->links() }}
    </div>

    <div class="contact-table">
        <table class="contact-table">
            <tr class="contact-table__row">
                <th class="contact-table__header">お名前</th>
                <th class="contact-table__header">性別</th>
                <th class="contact-table__header">メールアドレス</th>
                <th class="contact-table__header">お問い合わせの種類</th>
                <th class="contact-table__header">詳細</th>
            </tr>

            @foreach ($contacts as $contact)
            <tr class="contact-table__row">
                <td class="contact-table__item">
                    {{ $contact->last_name }} {{ $contact->first_name }}
                </td>
                <td class="contact-table__item">
                    @if($contact->gender == 1) 男性
                    @elseif($contact->gender == 2) 女性
                    @else その他 @endif
                </td>
                <td class="contact-table__item">
                    {{ $contact->email }}
                </td>
                <td class="contact-table__item">
                    {{-- ここを「安全な書き方」にします --}}
                    {{ optional($contact->category)->content ?? '未設定' }}
                </td>
                <td class="contact-table__item">
                    <form class="search-form" action="/admin/detail" method="get">
                        <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                        <button class="contact-table__detail-btn">詳細</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</main>
@endsection