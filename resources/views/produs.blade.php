    @extends('layouts.app')



@section('content')
    @if(Auth::check() && Auth::user()->tip_user>=1)

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Adauga produs') }}</div>

                    <div class="card-body">
                        <form action="{{ route('form.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="nume" class="col-md-4 col-form-label text-md-end">{{ __('Nume') }}</label>
                                <div class="col-md-6">
                                    <input id="nume" type="text" class="form-control @error('nume') is-invalid @enderror" name="nume" value="{{ old('nume') }}" required autocomplete="name" autofocus>
                                    @error('nume')
                                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Descriere') }}</label>
                                <div class="col-md-6">
                                    <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" value="{{ old('text') }}" required autocomplete="name" autofocus>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Selecteaza o fotografie:</label>
                                <div class="col-md-6">
                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Adauga produs') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        You do not have permission to view this page.
                    </div>
                </div>
            </div>
        </div>
@endif

@endsection

