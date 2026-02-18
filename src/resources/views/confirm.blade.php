<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Confirm</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>Confirm</h2>
            </div>
            <form class="form" action="/contacts" method="post">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                {{-- 画面表示用：姓名をスペースでつないで一行にする --}}
                                <p>{{ $contact['first_name'] }}　{{ $contact['last_name'] }}</p>
                                {{-- 送信用：hiddenでデータを裏側に持たせる --}}
                                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                {{-- 表示用 --}}
                                @php
                                $genderLabel = [
                                '1' => '男性',
                                '2' => '女性',
                                '3' => 'その他'
                                ][$contact['gender']] ?? '未選択';
                                @endphp
                                <p>{{ $genderLabel }}</p>
                                {{-- 送信用（隠しデータ） --}}
                                <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
                            </td>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['tel'] }}</p>
                                {{-- 送信用：hiddenでデータを裏側に持たせる --}}
                                <input type="hidden" name="tel" value="{{ $contact['tel'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                {{-- 表示用 --}}
                                @php
                                $categoryLabel = [
                                '1' => '商品のお届けについて',
                                '2' => '商品の交換について',
                                '3' => '商品トラブル',
                                '4' => 'ショップへのお問い合わせ',
                                '5' => 'その他'
                                ][$contact['category_id']] ?? '未選択';
                                @endphp
                                <p>{{ $categoryLabel }}</p>
                                {{-- 送信用（隠しデータ） --}}
                                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                <p>{{ $contact['detail'] }}</p>
                                <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>