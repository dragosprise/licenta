@extends('layouts.app')

@section('content')
{{--    @if(Auth::check() && Auth::user()->tip_user==0)--}}
    <div class="container">
        <h2>Inregistreaza-te ca Mestesugar</h2>
        <form action="{{ route('mestesugar.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

{{--            <div class="form-group mb-3">--}}
{{--                <label for="email">Email</label>--}}
{{--                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>--}}
{{--                @error('email')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                    <strong>{{ $message }}</strong>--}}
{{--                </span>--}}
{{--                @enderror--}}
{{--            </div>--}}

            <div class="form-group mb-3">
                <label for="descriere">Descriere</label>
                <input type="text" name="descriere" id="descriere" class="form-control @error('descriere') is-invalid @enderror" value="{{ old('descriere') }}" required>
                @error('descriere')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="image">Selecteaza o fotografie:</label>
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
{{--    @else--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        You do not have permission to view this page.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
@endsection
