<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - お問い合わせ一覧</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Fashionably Late
            </a>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Admin</h2>
            </div>
        </div>

        <div class="section__title">
            <h2>お問い合わせ検索</h2>
        </div>

        <form class="search-form" action="/admin/search" method="get">
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力" />
                <select class="search-form__item-select" name="category_id">
                    <option value="">カテゴリ</option>
                    @if($contacts->isEmpty())
                    <p>まだお問い合わせはありません。</p>
                    @else
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>

        <div class="contact-table">
            <table class="contact-table__inner">
                <tr class="contact-table__row">
                    <th class="contact-table__header">
                        <span class="contact-table__header-span">お名前</span>
                        <span class="contact-table__header-span">カテゴリ</span>
                    </th>
                    @foreach ($contacts as $contact)
                <tr class="contact-table__row">
                    <td class="contact-table__item">
                        <div class="update-form__item">
                            <p class="update-form__item-p">
                                {{ $contact->first_name }}　{{ $contact->last_name }}
                            </p>
                        </div>
                        <div class="update-form__item">
                            <p class="update-form__item-p">
                                {{ $contact->category->content ?? '未設定' }}
                            </p>
                        </div>
                    </td>
                    <td class="contact-table__item">
                        <div class="admin-action">
                            <button class="detail-button">詳細</button>

                            <form class="delete-form" action="/admin/delete" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{ $contact->id }}" />
                                <div class="delete-form__button">
                                    <button class="delete-form__button-submit" type="submit">削除</button>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>

</html>