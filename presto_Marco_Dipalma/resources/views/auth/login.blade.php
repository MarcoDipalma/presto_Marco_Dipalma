<x-layout>

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-3 pt-5 text-white">{{__('ui.Accedi')}}</h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">

                <form method="POST" action="{{route('login')}}" class="shadow-lg p-3 mb-5 bg-black.bg-gradient rounded">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.Email')}}</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                      </div>

                      <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.Password')}}</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>

                      <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">{{__('ui.Accedi')}}</button>
                    </div>
                </form>




            </div>
        </div>

    </div>

</x-layout>