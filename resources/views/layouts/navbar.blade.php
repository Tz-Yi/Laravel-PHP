<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href=""> Cyber Security </a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" type="button" name="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#profile">Author Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger disabled" href="#messageBoard">Message Board</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Laravel-Auth Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
