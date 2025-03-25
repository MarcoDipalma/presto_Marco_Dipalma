<x-layout>

    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1>{{__("ui.Dettaglio dell'articolo:")}} {{$article->title}} </h1>
            </div>
        </div>

        <div class="row py-5 justify-content-center align-items-center">

            <div class="col-12 col-md-6 mb-3">

              @if ($article->images->count() > 0)
                <div id="carouselExample" class="carousel slide">
                  <div class="carousel-inner">
                    @foreach ($article->images as $key=>$image)
                      <div class="carousel-item @if($loop->first) active @endif ">
                        <img src="{{$image->getUrl(300,300)}}" alt="Immagine {{$key + 1}} dell'articolo {{$article->title}}" class="d-block w-100 rounded shadow">  
                      </div>                        
                    @endforeach

                  </div>
                  @if ($article->images->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{__('ui.Precedente')}}</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">{{__('ui.Successivo')}}</span>
                    </button>
                      
                  @endif

                </div>
                  
              @else

                <img src="https://picsum.photos/300" alt="Nessuna foto inserita dall'utente">
                  
              @endif

            </div>

            <div class="col-12 col-md-6 mb-3 text-center">
                <h2 class="display-5"><span class="fw-semibold">{{__('ui.Titolo:')}} </span>{{$article->title}}</h2>

                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-normal">{{__('ui.Prezzo:')}} {{$article->price}}€</h4>
                    <h5 class="mt-2">{{__('ui.Descrizione:')}}</h5>
                    <p>{{$article->description}}</p>
                </div>

            </div>
            
        </div>


    </div>

    

</x-layout>