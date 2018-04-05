@extends('layouts.app')

@section('content')
    <div class="uk-container">
        <div class="uk-card uk-card-primary uk-card-body">
            <h3 class="uk-card-title">登录</h3>
            <form class="uk-form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

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
                    <div class="uk-form-controls">
                        <label><input class="uk-checkbox" type="checkbox"
                                      name="remember" {{ old('remember') ? 'checked' : '' }}> 记住密码</label>
                    </div>
                </div>

                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <button type="submit" class="uk-button uk-button-default">登录</button>
                        <a href="{{ route('password.request') }}">找回密码</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
