<?php
use Illuminate\Support\Facades\Route;
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark {{Route::currentRouteName() != 'main.index' ? 'bg-dark' : ''}} py-2" data-navbar-on-scroll="data-navbar-on-scroll">
  <div class="container"><a class="navbar-brand" href="{{ route('main.index') }}"><img src="{{asset('assets/img/sipema.png')}}" alt="" class="rounded" width="60px"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars text-white fs-3"></i></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
        {{-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Home</a></li> --}}
        @if(!empty(Auth::user()))
        <li class="nav-item">
          <span class="nav-link">Hai, {{ Auth::guard(session('guard_key'))->user()->name }}</span>
          <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName() == 'main.index') active @endif" aria-current="page" href="{{ route('main.index') }}">Home</a>
          </li>
        </li>
          @if(session('guard_key') == 'admin')
          <li class="nav-item">
            <a class="nav-link  @if(Route::currentRouteName() == 'main.complaint') active @endif" aria-current="page" href="{{ route('main.complaint') }}">Pengaduan</a>
          </li>
          @elseif(session('guard_key') == 'user')
          <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName() == 'main.aduan') active @endif" aria-current="page" href="{{ route('main.aduan') }}">Aduan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Route::currentRouteName() == 'main.history') active @endif" aria-current="page" href="{{ route('main.history') }}">History</a>
          </li>
          @endif
        @endif
        <li class="nav-item mt-2 mt-lg-0">
          @if(!empty(Auth::user()))
          <a class="nav-link btn btn-light text-black w-md-25 w-50 w-lg-100 rounded-pill" aria-current="page" href="{{ route('main.logout'); }}">Log Out</a>
          @else
          </li>
            <a class="nav-link btn btn-light text-black w-md-25 w-50 w-lg-100 rounded-pill" aria-current="page" href="{{ route('login.index'); }}">Log In</a>
          <li class="nav-item mt-2 mt-lg-0 mx-3">
            <a class="nav-link btn btn-dark text-white w-md-25 w-50 w-lg-100 rounded-pill" aria-current="page" href="{{ route('register.index'); }}">Register</a>
          @endif
        </li>
      </ul>
    </div>
  </div>
</nav>