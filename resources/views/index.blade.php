@extends('layouts.main')
@section('content')
<header class="header">
  <div class="container header__container">
    <button class="btn btn--primary header__new-task-btn">Create task</button>
    <div class="header__sort-box">
      <label class="header__sort-text" for="headerSelect">Sort by</label>
      <select name="headerSelect" id="headerSelect" class="select header__sort-select">
        <option value="1">Срок выполнения</option>
      </select>
    </div>
    <div class="header__user-box">
      <span id="headerUserAvatar" class="header__user-avatar">EK</span>
      <span id="headerUserName" class="header__user-name">{{ Auth::user()->name }}</span>
    </div>
    <a class="btn header__logout-btn"
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
@endsection

