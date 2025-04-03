<nav id="navbar" class="navbar navbar-expand-lg fixed-top bg-white">
  <div id="collapse" class="container-fluid bg-white">

      <a class="navbar-brand" href="{{route('home')}}">Presto.it</a>

    <button id="dropdown" class="navbar-toggler" style="color: white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-black" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
            
        <li class="nav-item">
          <a class="nav-link text-black" aria-current="page" href="{{route('article.index')}}">{{__('ui.Articoli')}}</a>
        </li>
          
        <li class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle text-black" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('ui.Categorie')}}
          </a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
              <li class="ms-2">
                <a href="{{route('article.byCategory', ['category'=>$category])}}" class="dropdown-item text-capitalize text-black">{{__("ui.$category->name")}}
                </a></li>
                  @if (!$loop->last)
                    <hr class="dropdown-divider">
                      
                  @endif
                    
                @endforeach
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-black" aria-current="page" href="{{route('aboutUs')}}">{{__('ui.Chi siamo')}}</a>
        </li>
            
        @guest
            
          <li class="nav-item">
            <a class="nav-link text-black" aria-current="page" href="{{route('login')}}">{{__('ui.Accedi')}}</a>
          </li>
              
          <li class="nav-item">
            <a class="nav-link text-black" aria-current="page" href="{{route('register')}}">{{__('ui.Registrati')}}</a>
          </li>
            
        @endguest
            
        @auth
            
          <li class="nav-item">
            <a class="nav-link text-black" aria-current="page" href="{{route('article.create')}}">{{__('ui.Crea')}}</a>
          </li>

          @if (Auth::user()->is_revisor)

            <li class="nav-item">
              <a href="{{route('revisor.index')}}" class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25 text-black">{{__('ui.Revisore')}} <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{\App\Models\Article::toBeRevisedCount()}}</span> </a>
            </li>
                
          @endif
            
            <li class="nav-item">
              <a href="" class="text-black nav-link dropdown-item" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.Disconnettiti')}}</a>
              <form action="{{route('logout')}}" method="POST" class="d-none" id="form-logout">@csrf</form>
            </li>
            
        @endauth
      </ul>

      <form action="{{route('article.search')}}" method="GET" role="search" class="d-flex ms-auto">
        <div class="input-group">
          <input type="search" name="query" class="form-control" placeholder="{{__('ui.Cerca')}}" aria-label="search">
          <button type="submit" class="input-group-text btn btn-outline-success" id="basic-addon2">{{__('ui.Cerca')}}</button>
        </div>
      </form>
  
      <x-_locale lang="it" />
      <x-_locale lang="en" />
      <x-_locale lang="es" />
    </div>
  </div>
</nav>
