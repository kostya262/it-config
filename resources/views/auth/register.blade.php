@extends('layouts.main')
@section('content')
    <main class="login-page">
        <section class="login">
            <div class="login__box">
                <form class="form register__form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="form__title">Registration</h1>
                    <div class="form__inputs">
                        <div class="form__group">
                            <label class="form__label" for="formLogin">Username</label>
                              <input
                              class="form__input"
                              type="text"
                              name="name"
                              id="formLogin"
                              placeholder="Type your username"
                              data-validate-field="userName">
                        </div>
                        <div class="form__group">
                            <label class="form__label" for="formEmail">E-mail</label>
                              <input
                              class="form__input"
                              type="email"
                              name="email"
                              id="formEmail"
                              placeholder="Type your email"
                              data-validate-field="email">
                        </div>
                        <div class="form__group">
                            <label class="form__label" for="formPassword">Password</label>
                              <input
                              class="form__input"
                              type="password"
                              name="password"
                              id="formPassword"
                              placeholder="Type your password"
                              data-validate-field="password">
                        </div>
                        <div class="form__group">
                            <label class="form__label" for="formPasswordRepeat">Password repeat</label>
                            <input
                            class="form__input"
                            type="password"
                            name="password_confirmation"
                            id="formPasswordRepeat"
                            placeholder="Type your password again"
                            data-validate-field="passwordRepeat">
                        </div>
                    </div>
                    <button class="btn btn--primary form__btn" type="submit">Registration</button>
                    <a class="form__link" href="{{ route('login') }}">Login</a>
                </form>
            </div>
        </section>
    </main>
@endsection

