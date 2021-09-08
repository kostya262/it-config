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
    <a href="#createTask" rel="modal:open" class="btn btn--small btn--primary header__new-task-btn">Create task</a>
    <div class="header__sort-box">
      <label class="header__sort-text" for="headerSelect">Sort by</label>
      <select name="headerSelect" id="headerSelect" class="select header__sort-select">
        <option value="0">Срок выполнения</option>
        <option value="1">Имя пользователя</option>
        <option value="2">Статус</option>
        <option value="3">Дата выполнения</option>
      </select>
    </div>
    <article class="header__user-box user">
      <span class="user__avatar user__avatar--mini" style="background-color:{{ $usersList[Auth::user()->email]['color'] }}">
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
            <button class="task-card__menu-btn">
              <span class="task-card__sphere"></span>
            </button>
            <div class="task-card__users-list">
              <div class="task-card__main-user">
                <article class="user">
                  <span class="user__avatar user__avatar--mini" style="background-color:{{ $usersList[Auth::user()->email]['color'] }}">
                    {{ $usersList[Auth::user()->email]['placeholder'] }}
                  </span>
                  <span class="user__name">{{ $usersList[Auth::user()->email]['name'] }}</span>
                </article>
              </div>
            </div>
            <h3 class="task-card__title">Lorem ipsum dolor sit amet.</h3>
            <p class="task-card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati a itaque delectus omnis error dolores aut ullam maxime officia velit.</p>
            <div class="task-card__management">
              <div class="task-card__select-box">
                <label class="task-card__label" for="taskStatus0">Статус задачи</label>
                <select name="taskStatus" id="taskStatus0" class="select task-card__select">
                  <option value="Added">Добавлена</option>
                  <option value="In work">В работе</option>
                  <option value="Complete">Завершена</option>
                </select>
              </div>
              <div class="task-card__input-box task-card__input-box-deadline" data-placeholder="12.12.2002">
                <label class="task-card__label" for="dateStart0">Срок выполнения</label>
                <input type="date" name="dateStart" id="dateStart0" class="task-card__input">
              </div>
              <div class="task-card__input-box task-card__input-box-complete" data-placeholder="—">
                <label class="task-card__label" for="dateEnd0">Дата выполнения</label>
                <input type="date" name="dateEnd" id="dateEnd0" class="task-card__input">
              </div>
            </div>
          </article>
        </li>
      </ul>
    </div>
  </section>
</main>
<div class="modal" id="createTask">
  <form class="create-task">
    @csrf
    <h1 class="form__title">Создание задачи</h1>
    <div class="form__inputs">
        <div class="form__group">
            <label class="form__label" for="formLogin">Название задачи</label>
            <div class="form__input-box">
                <input
                class="form__input"
                type="text"
                name="title"
                id="formTitle"
                placeholder="Произвольная строка"
                data-validate-field="title">
            </div>
        </div>
        <div class="form__group">
            <label class="form__label" for="formPassword">Описание задач</label>
            <div class="form__input-box">
                <textarea
                class="form__input"
                name="description"
                id="formDescription"
                placeholder="Произвольная строка"
                data-validate-field="description">
                </textarea>
            </div>
        </div>
    </div>
    <div class="form__inputs--line">
      <div class="task-card__users-list">
        <p class="user-list__label">Исполнитель</p>
        <div class="task-card__main-user">
          <article class="user">
            <span class="user__avatar" style="background-color:{{ $usersList[Auth::user()->email]['color'] }}">
              {{ $usersList[Auth::user()->email]['placeholder'] }}
            </span>
            <span class="user__name">{{ $usersList[Auth::user()->email]['name'] }}</span>
          </article>
        </div>
      </div>
      <div class="task-card__input-box form__date-picker" data-placeholder="12.12.2002">
        <label class="task-card__label" for="dateStart">Срок выполнения</label>
        <input type="date" name="dateStart" id="dateStart" class="task-card__input">
      </div>
      <a href="#close-modal" rel="modal:close" class="btn">Discard</a>
      <button class="btn btn--primary" type="submit">Create task</button>
    </div>
  </form>
</div>
@endsection

