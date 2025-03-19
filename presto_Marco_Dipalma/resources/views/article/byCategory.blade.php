<x-layout>

    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1 class="fw-normal">{{__('ui.Articoli per categoria')}} <span class="fst-italic">{{$category->name}}</span></h1>
            </div>
        </div>

        <div class="row py-5 justify-content-center align-items-center">
            @forelse ($articles as $article)

                <div class="col-12 col-md-3">
                    <x-card :article=$article />
                </div>
    
            @empty

                <div class="col-12 text-center">
                    <h3 class="display-6 fw-normal text-center">{{__('ui.Non ci sono articoli')}}</h3>
                    @auth
                    <a class="btn btn-primary" href="{{route('article.create')}}">{{__('ui.Crea articolo')}}</a>
                    @endauth
                </div>
                
            @endforelse
        </div>

    </div>



</x-layout>