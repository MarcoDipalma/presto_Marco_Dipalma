<nav class="navbar navbar-expand bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Presto.it</a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link text-black" aria-current="page" href="{{route('home')}}">Home</a>

          @guest
          
          <a class="nav-link text-black" aria-current="page" href="{{route('login')}}">Accedi</a>

          <a class="nav-link text-black" aria-current="page" href="{{route('register')}}">Registrati</a>
              
          @endguest

          @auth
          
          <a class="nav-link text-black" aria-current="page" href="{{route('article.create')}}">Crea</a>

            <a href="" class="text-black nav-link dropdown-item" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
            <form action="{{route('logout')}}" method="POST" class="d-none" id="form-logout">@csrf</form>

          @endauth

        </div>
      </div>
    </div>
</nav>