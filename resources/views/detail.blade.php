@extends('layouts.app')

@section('content')
    <div class="uk-container">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ config('app.name') }}</a></li>
            <li><a href="{{ route('market') }}">所有栏目</a></li>
            <li><span>{{ $book->name }}</span></li>
        </ul>
        <div class="uk-card uk-card-default uk-card-body uk-text-center">
            <h3 class="uk-card-title">{{ $book->name }}</h3>
            <p><i>{{ $book->description }}</i></p>
            <ul class="uk-subnav uk-subnav-divider uk-flex-inline" uk-margin>
                <li class="uk-active">已有 {{ $book->users->count() }} 个用户订阅</li>
                <li>{{ $book->tag }}</li>
                <li>ID: {{ $book->id }}</li>
            </ul>
            <br>
            @if(\Illuminate\Support\Facades\Auth::user()->books->contains($book))
                <button id="toggleBtn" onclick="subscribe({{ $book->id }})" class="uk-button uk-button-secondary">取消订阅
                </button>
            @else
                <button id="toggleBtn" onclick="subscribe({{ $book->id }})" class="uk-button uk-button-primary">立即订阅
                </button>
            @endif
            <hr class="uk-divider-icon">
            <p>期刊预览</p>
            <span id="spinner" class="uk-margin-small-right" uk-spinner="ratio: 3"></span>
            <ul id="article-list" class="uk-list uk-hidden"></ul>
        </div>
    </div>

    @push('scripts')
        <script>
            axios.get('{{ route('bookFeed', $book->id) }}')
                .then(function (response) {
                    feeds = response.data;
                    for (var index in feeds) {
                        var title = feeds[index]['title'];
                        var link = feeds[index]['link'];
                        $('#article-list').append('<li><a href="' + link + '">' + title + '</a></li>');
                    }
                    $('#spinner').addClass('uk-hidden');
                    $('#article-list').removeClass('uk-hidden');
                })
                .catch(function (error) {
                    console.log(error);
                    UIkit.notification("<span class=\"iconfont icon-cross\"></span> 查询期刊内容失败，服务器发生了错误。");
                });

            function subscribe(id) {
                if ($('#toggleBtn').text() == '立即订阅') {
                    axios.post('/subscribe', {
                        book_id: id
                    })
                        .then(function (response) {
                            UIkit.notification("<span class=\"iconfont icon-check\"></span> 订阅成功。");
                            $('#toggleBtn').removeClass('uk-button-primary');
                            $('#toggleBtn').addClass('uk-button-secondary');
                            $('#toggleBtn').text('取消订阅');
                        })
                        .catch(function (error) {
                            console.log(error);
                            UIkit.notification("<span class=\"iconfont icon-cross\"></span> 订阅失败，服务器发生了错误。");
                        });
                } else {
                    axios.post('/unsubscribe', {
                        book_id: id
                    })
                        .then(function (response) {
                            UIkit.notification("<span class=\"iconfont icon-check\"></span> 退订成功。");
                            $('#toggleBtn').removeClass('uk-button-secondary');
                            $('#toggleBtn').addClass('uk-button-primary');
                            $('#toggleBtn').text('立即订阅');
                        })
                        .catch(function (error) {
                            console.log(error);
                            UIkit.notification("<span class=\"iconfont icon-cross\"></span> 退订失败，服务器发生了错误。");
                        });
                }
            }
        </script>
    @endpush
@endsection
