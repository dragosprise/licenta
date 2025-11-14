<x-app-layout>
    <link rel="stylesheet" href="/css/app.css">

    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    {{--    {{ dd($) }}--}}
    <h1>{{ $nume }}</h1>
    {!!   $text !!}
    @if ($tipuriproduse->image)
        <img src="{{ asset('/storage/' . $tipProdus->image) }}" alt="{{ $tipProdus->nume }}" class="product-img">
    @else
        <p>Nu există fotografie</p>
    @endif

</x-app-layout>
