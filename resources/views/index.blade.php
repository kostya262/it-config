@extends('layouts.main')
@section('content')
<header class="header">
  <div class="container header__container">
    <button class="btn btn--small btn--primary header__new-task-btn">Create task</button>
    <div class="header__sort-box">
      <label class="header__sort-text" for="headerSelect">Sort by</label>
      <select name="headerSelect" id="headerSelect" class="select header__sort-select">
        <option value="1">Срок выполнения</option>
      </select>
    </div>
    <article class="header__user-box user">
      <span class="user__avatar">
        @php
      </span>
      <span class="user__name">{{ Auth::user()->name }}</span>
    </article>
    <a class="btn btn--small header__logout-btn"
    href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
      Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</header>

<main class="index">
  <section class="todo">
    <div class="container">
      <ul class="todo__list">
        <li class="todo__item">
          <article class="task-card">
            <div class="task-card__users-list">
              <div class="task-card__main-user">

              </div>

            </div>
          </article>
        </li>
      </ul>
    </div>
  </section>
</main>
@endsection

