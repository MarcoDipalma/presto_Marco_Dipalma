<x-layout>

    <div class="container-fluid pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-3">
                <h1 class="fw-normal text-center pb-2">
                    {{__('ui.Dashboard Revisore')}}
                </h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center">

            @if ($article_to_check)
            
                @if ($article_to_check->images->count())
            
                    @foreach ($article_to_check->images as $key=>$image)

                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{$image->getUrl(300,300)}}" alt="Immagine {{$key + 1}} dell'articolo '{{$article_to_check->title}}'" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-5 ps-3">
                                        <div class="card-body">
                                            <h5>Labels</h5>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    #{{$label}},
                                                @endforeach
                                            @else
                                                <p class="fst-italic">No labels</p>
                                                
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-body">
                                            <h5>Ratings</h5>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->adult}}"></div>
                                                </div>
                                                <div class="col-10">adult</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->violence}}"></div>
                                                </div>
                                                <div class="col-10">violence</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->spoof}}"></div>
                                                </div>
                                                <div class="col-10">spoof</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->racy}}"></div>
                                                </div>
                                                <div class="col-10">racy</div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto {{$image->medical}}"></div>
                                                </div>
                                                <div class="col-10">medical</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <h1 class="fs-4">{{__('ui.Titolo:')}} <span class=" fs-2 fst-italic">{{$article_to_check->title}}</span></h1>
                        <h3 class="fs-4">{{__('ui.Autore:')}} <span class="fs-2 fst-italic">{{$article_to_check->user->name}}</span></h3>
                        <h4 class="fs-4">{{__('ui.Prezzo:')}} <span class="fs-2 fst-italic">{{$article_to_check->price}}€</span></h4>
                        <h4 class="fs-4">{{__('ui.Categoria:')}} <span class="fs-2 fst-italic">#{{$article_to_check->category->name}}</span></h4>
                        <p class="fs-6">{{__('ui.Descrizione:')}} <span class="fs-5 fst-italic">{{$article_to_check->description}}</span></p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{route('reject', ['article'=>$article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">{{__('ui.Rifiuta')}}</button>
                        </form>
                        <form action="{{route('accept', ['article'=>$article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">{{__('ui.Accetta')}}</button>
                        </form>
                    </div>
                
                </div>
        
            @else
            
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-12">
                        <h1 class="fst-italic display-4">
                            {{__('ui.Nessun articolo da revisionare')}}
                        </h1>
                        <a href="{{route('home')}}" class="mt-5 btn btn-success">{{__("ui.Torna all'homepage")}}</a>
                    </div>
                </div>

            @endif
            
        </div>

    </div>

</x-layout>