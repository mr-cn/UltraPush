@extends('layouts.app')

@section('content')
    <div class="uk-container uk-text-center uk-margin-large-bottom">
        <h1 class="uk-margin">{{ config('app.name') }}: 一个 Kindle 期刊推送网站</h1>
        <a class="uk-margin uk-button uk-button-primary">开始使用</a>
        <div class="uk-grid-divider uk-margin-large-top uk-child-width-1-1@s uk-text-left@m uk-text-center@s" uk-grid>
            <div class="uk-width-1-4@m"><h3>只需 3 步</h3>快速开始你的 Kindle 订阅</div>
            <div class="uk-width-1-5@m"><h3>Step 1</h3>注册 {{ config('app.name') }} 账户</div>
            <div class="uk-width-1-3@m"><h3>Step 2</h3>设置 Amazon 账户“已认可的发件人电子邮箱”</div>
            <div class="uk-width-1-5@m"><h3>Step 3</h3>挑选订阅源</div>
        </div>
    </div>
    <hr class="uk-divider-icon uk-margin-large-bottom">
    <div class="uk-container uk-text-center uk-margin-large-bottom">
        <h2 class="uk-margin">Features</h2>
        <div class="uk-margin-large-top uk-child-width-1-3@m uk-child-width-1-1@s uk-text-center" uk-grid>
            <div><p class="icon-photo iconfont" style="font-size: 128px"></p>
                <h3 class="uk-margin-remove">图文混排</h3>自动采集图片并编排到期刊
            </div>
            <div><p class="icon-feed3 iconfont" style="font-size: 128px"></p>
                <h3 class="uk-margin-remove">RSS 采集</h3>自定义 RSS 源，全文采集
            </div>
            <div><p class="icon-clock iconfont" style="font-size: 128px"></p>
                <h3 class="uk-margin-remove">定时发送</h3>每日定时推送到你的 Kindle 设备
            </div>
        </div>
    </div>
@endsection
