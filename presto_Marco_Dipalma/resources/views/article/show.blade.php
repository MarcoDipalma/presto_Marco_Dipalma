<x-layout>

    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1>Dettaglio dell'articolo: {{$article->title}} </h1>
            </div>
        </div>

        <div class="row py-5 justify-content-center align-items-center">

            <div class="col-12 col-md-6 mb-3">

                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="Immagine articolo {{$article->title}}">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="Immagine articolo {{$article->title}}">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="Immagine articolo {{$article->title}}">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>

            <div class="col-12 col-md-6 mb-3 text-center">
                <h2 class="display-5"><span class="fw-semibold">Titolo: </span>{{$article->title}}</h2>

                <div class="d-flex flex-column justify-content-center h-75">
                    <h4 class="fw-normal">Prezzo: {{$article->price}}€</h4>
                    <h5 class="mt-2">Descrizione:</h5>
                    <p>{{$article->description}}</p>
                </div>

            </div>
            
        </div>


    </div>

    

</x-layout>