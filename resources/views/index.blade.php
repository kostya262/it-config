@extends('layouts.main')
@section('content')
@php
  // Создаем заменитель аватара пользователя
  function createAvatarUserPlaceholder($userName) {
    if (isset($userName)) {
      $userNameArray =
      explode(' ',
        trim(
          preg_replace('/\s/', ' ', $userName)));
      return count($userNameArray) == 1 ? $userNameArray[0][0]:(count($userNameArray) >= 2 ? $userNameArray[0][0].''.$userNameArray[1][0]:'?');
    }
    return '?';
  }
  // Получаем случайный цвет в формате rgb
  function getRandomBackgroundColor() {
    $result = 'rgb(';
    $firstColor = random_int(0, 2);
    $secondColor = random_int(0, 1);
    $secondColorInt = random_int(100, 225);
    if ($firstColor == 0) {
      $result .= '255,' . ($secondColor ? "$secondColorInt,0":"0,$secondColorInt");
    } else if ($firstColor == 1) {
      $result .= ($secondColor ? "$secondColorInt,":"0,") . '255,' . (!$secondColor ? "$secondColorInt":"0");
    } else {
      $result .= ($secondColor ? "$secondColorInt,0":"0,$secondColorInt") . ',255';
    }
    return $result . ');';
  }
  $usersRawData = DB::table('users')->get();
  $usersList = [];
  foreach ($usersRawData as $user) {
    $usersList[$user->email] = [
      'name' => $user->name,
      'placeholder' => createAvatarUserPlaceholder($user->name),
      'color' => getRandomBackgroundColor()
    ];
  }
@endphp
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
      <span class="user__avatar" style="background-color:{{ $usersList[Auth::user()->email]['color'] }}">
        {{ $usersList[Auth::user()->email]['placeholder'] }}
      </span>
      <span class="user__name">{{ $usersList[Auth::user()->email]['name'] }}</span>
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
    <div class="container todo__container">
      <ul class="list-reset todo__list">
        <li class="todo__item">
          <article class="task-card">
            <div class="task-card__users-list">
              <div class="task-card__main-user">
                <article class="header__user-box user">
                  <span class="user__avatar" style="background-color:{{ $usersList[Auth::user()->email]['color'] }}">
                    {{ $usersList[Auth::user()->email]['placeholder'] }}
                  </span>
                  <span class="user__name">{{ $usersList[Auth::user()->email]['name'] }}</span>
                </article>
                <h3 class="task-card__title">Lorem ipsum dolor sit amet.</h3>
                <p class="task-card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati a itaque delectus omnis error dolores aut ullam maxime officia velit.</p>
                <div class="task-card__management">
                  <select name="taskStatus" id="taskStatus0" class="select task-card__select">
                    <option value="">Добавлена</option>
                  </select>
                  <input type="date" name="dateStart" id="dateStart0">
                  <label for="dateEnd0">—</label>
                  <input type="date" name="dateEnd" id="dateEnd0">
                </div>
              </div>
            </div>
          </article>
        </li>
      </ul>
    </div>
  </section>
</main>
@endsection

