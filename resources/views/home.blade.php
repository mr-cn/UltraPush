@extends('layouts.app')

@section('content')
    <div class="uk-container">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('welcome') }}">{{ config('app.name') }}</a></li>
            <li><span>我的订阅</span></li>
        </ul>
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">上次推送状态</h3>
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th class="uk-width-1-4">地址</th>
                    <th>状态</th>
                </tr>
                </thead>
                <tbody>
                @foreach($addressees as $addressee)
                    <tr>
                        <td>{{ $addressee['address'] }}</td>
                        <td>{{ $addressee['last_state'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="#" class="uk-button uk-button-primary uk-hidden">投递测试文档</a>
            <a href="#" class="uk-button uk-button-default">投递设置</a>
        </div>
        <div class="uk-margin-large-top uk-card uk-card-default uk-card-body uk-overflow-auto">
            <h3 class="uk-card-title">我订阅的栏目</h3>
            <table class="uk-table uk-table-justify uk-table-divider uk-table-middle">
                <thead>
                <tr>
                    <th class="uk-width-small">订阅栏目</th>
                    <th class="uk-table-expand">介绍</th>
                    <th class="uk-width-small">推送参数</th>
                    <th class="uk-width-small"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->description }}</td>
                        <td><code>{{ json_encode($book->pivot->option) }}</code></td>
                        <td>
                            <button class="uk-button uk-button-default" type="button"
                                    onclick="unsubscribe({{ $book->id }})">退订
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            function unsubscribe(id) {
                UIkit.modal.confirm('你确定要退订此栏目吗？').then(function () {
                    axios.post('/unsubscribe', {
                        book_id: id
                    })
                        .then(function (response) {
                            UIkit.notification("<span class=\"iconfont icon-check\"></span> 退订成功，请刷新页面。");
                        })
                        .catch(function (error) {
                            console.log(error);
                            UIkit.notification("<span class=\"iconfont icon-cross\"></span> 退订失败，服务器发生了错误。");
                        });
                }, function () {
                    console.log('Rejected.')
                });
            }
        </script>
    @endpush
@endsection
