@extends('layouts.main')
@section('content')
    <main class="login-page">
        <section class="login">
            <div class="login__box">
                <form class="form login__form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="form__title">Registration</h1>
                    <div class="form__inputs">
                        <div class="form__group">
                            <label class="form__label" for="formLogin">Username</label>
                            <div class="form__input-box">
                                <input class="form__input" type="text" name="name" id="formLogin" placeholder="Type your username">
                            </div>
                        </div>
                        <div class="form__group">
                            <label class="form__label" for="formLogin">E-mail</label>
                            <div class="form__input-box">
                                <input class="form__input" type="email" name="email" id="formLogin" placeholder="Type your email">
                            </div>
                        </div>
                        <div class="form__group">
                            <label class="form__label" for="formPassword">Password</label>
                            <div class="form__input-box">
                                <input class="form__input" type="password" name="password" id="formPassword" placeholder="Type your password">
                            </div>
                        </div>
                        <div class="form__group">
                            <label class="form__label" for="formPassword">Password repeat</label>
                            <div class="form__input-box">
                                <input class="form__input" type="password" name="password_confirmation" id="formPassword" placeholder="Type your password again">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn--primary form__btn" type="submit">Registration</button>
                    <a href="{{ route('login') }}">Login</a>
                </form>
            </div>
        </section>
    </main>
@endsection

