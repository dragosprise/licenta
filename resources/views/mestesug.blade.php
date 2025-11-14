@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->tip_user >= 1)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Adauga mestesug') }}</div>

                    <div class="card-body">
                        <form method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="denumire" class="col-md-4 col-form-label text-md-end">{{ __('Denumire') }}</label>

                                <div class="col-md-6">
                                    <input id="denumire" type="text" class="form-control @error('denumire') is-invalid @enderror" name="denumire" value="{{ old('denumire') }}" required autocomplete="name" autofocus>

                                    @error('denumire')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="descriere" class="col-md-4 col-form-label text-md-end">{{ __('Descriere') }}</label>

                                <div class="col-md-6">
                                    <input id="descriere" type="text" class="form-control @error('descriere') is-invalid @enderror" name="descriere" value="{{ old('descriere') }}" required autocomplete="name" autofocus>

                                    @error('descriere')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">


                                </div>
                            </div>
                            <div class="row mb-0"></div>
{{--                            <form action="{{ route('photo.upload') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <label for="photo">Select a photo:</label>--}}
{{--                                <input type="file" id="photo" name="photo">--}}

{{--                            </form>--}}
{{--                            <div class="row mb-3"></div>--}}
{{--                            <div class="row mb-0">--}}
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Adauga mestesug') }}
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

