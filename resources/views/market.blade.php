@extends('layouts.app')

@section('content')
    <div class="uk-container">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ config('app.name') }}</a></li>
            <li><span>所有栏目</span></li>
        </ul>
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">所有栏目</h3>
            <div uk-grid>
                <div class="uk-width-small uk-margin-top uk-margin-right">
                    <ul class="uk-nav uk-nav-default">
                        <li{!! $currentTag == "全部" || $isErrorTag ? ' class="uk-active"' : "" !!}><a href="?">全部</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        @foreach($allTag as $tag)
                            <li{!! $currentTag == $tag ? ' class="uk-active"' : "" !!}><a
                                        href="?tag={{ $tag }}">{{ $tag }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="uk-width-expand">
                    @if($isErrorTag)
                        <div class="uk-alert-danger" uk-alert>
                            <p>你所选择的标签下没有书籍。</p>
                        </div>
                    @endif
                    @foreach($books as $book)
                        <article class="uk-comment uk-margin-bottom">
                            <header class="uk-comment-header uk-flex-middle">
                                <h4 class="uk-comment-title uk-margin-remove">
                                    <a class="uk-link-reset"
                                       href="{{ route('bookDetail', $book->id) }}">{{ $book->name }}</a>
                                    @if(\Illuminate\Support\Facades\Auth::user()->books->contains($book))
                                        <span class="uk-label">已订阅</span>
                                    @endif
                                </h4>
                                <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                    <li><span>{{ $book->tag }}</span></li>
                                    <li><a href="{{ route('bookDetail', $book->id) }}">预览</a></li>
                                </ul>
                            </header>
                            <div class="uk-comment-body">
                                <p>{{ $book->description }}</p>
                                <a href="{{ route('bookDetail', $book->id) }}"
                                   class="uk-button uk-button-primary">查看详情</a>
                            </div>
                        </article>
                    @endforeach

                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
