<x-app-layout>
    <style>

        .product-item {
            border: 1px solid #ddd;
            padding: 20px;
            height: 30%;
            box-sizing: border-box;
        }
        .product-img {
            width: 50%; /* Image takes full width of its container */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 10px;
        }
        .product-name {
            font-weight: bold;
        }
        .product-description {
            font-size: 0.9em;}

    </style>
{{--    {{dd($tipuriProduse)}}--}}
    <table>
        <tbody>
        <tr>
            @foreach ($tipuriProduse as $index => $tipProdus)
                <td class="product">
                    <div class="product-item">
                        @if ($tipProdus->image)
                            <img src="{{ asset('/storage/' . $tipProdus->image) }}" alt="{{ $tipProdus->nume }}" class="product-img">
                        @else
                            <p>Nu există fotografie</p>
                        @endif
                       <div class="product-name">{{ $tipProdus->nume }}</div>
                            <div class="product-description">{!! $tipProdus->text !!}</div>
                    </div>
                </td>
                @if (($index + 1) % 3 == 0) <!-- Close and start new row after every third product -->
        </tr><tr>
            @endif
            @endforeach
        </tr>
        </tbody>
    </table>
    <div class="gaura">
    </div>  <div class="gaura">
    </div>  <div class="gaura">
    </div>
</x-app-layout>
