<!-- <nav
    class="flex justify-between bg-white px-8 py-4 rounded-t fixed max-w-3xl w-full inset-x-0 mx-auto bottom-0 border-t-2 z-50">
    <a href="{{route('app')}}" class="{{request()->routeIs('app') ? 'active' : null }}">
        <i class="fas fa-xl fa-home text-xl"></i>
        <small class="text-xs block">Home</small>
    </a>
    <a href="{{route('app.transaction')}}" class="{{request()->routeIs('app.transaction.*') || request()->routeIs('app.transaction') ? 'active' : null }}">
        <i class="fas fa-xl fa-receipt text-xl"></i>
        <small class="text-xs block">Transaction</small>
    </a>
    @auth
    <a href="{{route('app.profile')}}" class="{{request()->routeIs('app.profile') ? 'active' : null }}">
        <i class="fas fa-xl fa-user text-xl"></i>
        <small class="text-xs block">Profile</small>
    </a>
    @else
    <a href="{{route('login')}}"
        class="{{request()->routeIs('login') ? 'active' : (request()->routeIs('register') ? 'active' : null) }}">
        <i class="fas fa-xl fa-sign-in-alt text-xl"></i>
        <small class="text-xs block">Login</small>
    </a>
    @endauth
</nav> -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="{{asset('images/logo-angkasa.jpg')}}" alt="Bootstrap" width="30" height="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a aria-current="page" href="{{route('app')}}" class="nav-link {{request()->routeIs('app') ? 'active' : null }}">Home</a>
        </li>
        <li class="nav-item">
          <a aria-current="page" href="{{route('app.transaction')}}" class="nav-link {{request()->routeIs('app.transaction.*') || request()->routeIs('app.transaction') ? 'active' : null }}">Transaction</a>
        </li>
        @auth
        <li class="nav-item">
          <a aria-current="page" href="{{route('app.profile')}}" class="nav-link {{request()->routeIs('app.profile') ? 'active' : null }}">Profile</a>
        </li>
        @else
        <li class="nav-item">
          <a aria-current="page" href="{{route('login')}}" class="nav-link {{request()->routeIs('login') ? 'active' : (request()->routeIs('register') ? 'active' : null) }}">Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
