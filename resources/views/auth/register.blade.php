@extends('layouts.app')

@section('content')
    <div class="uk-container">
        <div class="uk-card uk-card-primary uk-card-body">
            <h3 class="uk-card-title">注册</h3>
            <i>所有选项均为必填。</i>
            <form class="uk-form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="uk-margin">
                    <label class="uk-form-label" for="name">用户名</label>
                    <div class="uk-form-controls">
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                               class="uk-input{{ $errors->has('name') ? ' uk-form-danger' : '' }}" required autofocus>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="email">E-Mail 地址</label>
                    <div class="uk-form-controls">
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               class="uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}" required autofocus>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="password">密码</label>
                    <div class="uk-form-controls">
                        <input id="password" type="password" name="password"
                               class="uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}" required>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="password-confirm">重复密码</label>
                    <div class="uk-form-controls">
                        <input id="password-confirm" type="password" name="password_confirmation"
                               class="uk-input" required>
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <button type="submit" class="uk-button uk-button-default">注册</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
