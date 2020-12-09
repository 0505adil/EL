<nav class="navbar navbar-expand-md navbar-dark  fixed-top">
  <a class="navbar-brand" href="#">E-Learning</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ml-3 mr-3">

        <a class="nav-link" href="{{ Route('home')}}"><img src="img/icons/outline_home.png" class="icon ">   Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/courses"><img src="img/icons/outline_local.png" class="icon ">   Courses</a>
      </li>
      <li class="nav-item ml-3 mr-3" >
        <a class="nav-link" href="/login">   Sign in</a>
      </li>
      @if(Auth::user())
      <li class="nav-item" style="">
         <a  class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
      @endif
    </ul>
    <form method="get" action="/basket">
      <button class="btn btn-success">Профиль</button>
    </form>
  </div>
</nav>
