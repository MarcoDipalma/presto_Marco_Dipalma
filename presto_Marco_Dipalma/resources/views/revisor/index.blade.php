<x-layout>

    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-3">
                <h1 class="fw-normal text-center pb-2">
                    Revisor Dashboard
                </h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center">

            @if ($article_to_check)
            
                @if ($article_to_check->images->count())
            
                    @foreach ($article_to_check->images as $key=>$image)
            
                        <div class="col-6 col-md-4 mb-4">
                            <img src="{{Storage::url($image->path)}}" alt="immagine {{$key +1}} dell'articolo ' {{$article_to_check->title}}" class="img-fluid rounded shadow">
                        </div>
            
                    @endforeach
            
                @else
                     @for ($i = 0; $i < 6; $i++)
                        <div class="col-6 col-md-4 mb-4 text-center">
                            <img src="https://picsum.photos/300" alt="immagine segnaposto" class="img-fluid rounded shadow">
                        </div>
                    @endfor
            
                @endif
            
            
                @if (session()->has('message'))
                    <div class="row justify-content-center">
                        <div class="col-5 alert alert-success text-center shadow rounded">
                            {{session('message')}}
                        </div>
                    </div>
                @endif
            
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>Titolo: {{$article_to_check->title}}</h1>
                        <h3>Autore: {{$article_to_check->user->name}}</h3>
                        <h4>Prezzo: {{$article_to_check->price}}€</h4>
                        <h4 class="fst-italic">Categoria: #{{$article_to_check->category->name}}</h4>
                        <p>Descrizione: {{$article_to_check->description}}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{route('reject', ['article'=>$article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                        </form>
                        <form action="{{route('accept', ['article'=>$article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                        </form>
                    </div>
                
                </div>
        
            @else
            
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-12">
                        <h1 class="fst-italic display-4">
                            Nessun articolo da revisionare
                        </h1>
                        <a href="{{route('home')}}" class="mt-5 btn btn-success">Torna all'homepage</a>
                    </div>
                </div>

            @endif
            
        </div>

    </div>

</x-layout>