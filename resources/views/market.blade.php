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
                        <li class="uk-active"><a href="#">全部</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#">科技</a></li>
                        <li><a href="#">商业</a></li>
                    </ul>
                </div>
                <div class="uk-width-expand">
                    <article class="uk-comment uk-margin-bottom">
                        <header class="uk-comment-header uk-flex-middle">
                            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Solidot</a>
                            </h4>
                            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                <li><span>科技</span></li>
                                <li><a href="#">预览</a></li>
                            </ul>
                        </header>
                        <div class="uk-comment-body">
                            <p>Solidot是至顶网下的科技资讯网站，主要面对开源自由软件和关心科技资讯读者群，包括众多中国开源软件的开发者，爱好者和布道者。口号是“奇客的资讯，重要的东西”。</p>
                            <a href="#" class="uk-button uk-button-primary">查看详情</a>
                        </div>
                    </article>
                    <article class="uk-comment uk-margin-bottom">
                        <header class="uk-comment-header uk-flex-middle">
                            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">知乎每日精选</a>
                            </h4>
                            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                <li><span>综合</span></li>
                                <li><a href="#">预览</a></li>
                            </ul>
                        </header>
                        <div class="uk-comment-body">
                            <p>知乎日报是一款拥有千万用户的资讯类客户端，每日提供来自知乎社区的精选问答，还有国内一流媒体的专栏特稿。</p>
                            <a href="#" class="uk-button uk-button-primary">查看详情</a>
                        </div>
                    </article>
                    <ul class="uk-pagination" uk-margin>
                        <li><a href="#"><span uk-pagination-previous></span></a></li>
                        <li><a href="#">1</a></li>
                        <li class="uk-disabled"><span>...</span></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li class="uk-active"><span>7</span></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                        <li><a href="#">10</a></li>
                        <li class="uk-disabled"><span>...</span></li>
                        <li><a href="#">20</a></li>
                        <li><a href="#"><span uk-pagination-next></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')

    @endpush
@endsection
