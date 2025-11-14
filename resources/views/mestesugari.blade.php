<x-app-layout>
    <style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    }
    th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    </style>
    <table>
        <thead>
        <tr>
            <th>Nume</th>
            <th>Descriere</th>
            <th>Poza</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($mestesugar as $mestesugar)
            <tr>
                <td>{{ $mestesugar->name }}</td>
                <td>{{ $mestesugar->descriere }}</td>
                <td>@if ($mestesugar->image)
                    <img src="{{ asset('/storage/' . $mestesugar->image) }}" alt="{{ $mestesugar->name }}" class="mestesugar-img" style="width: 200px; height: auto;">
                @else
                    <p>Nu există fotografie</p>
                @endif</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</x-app-layout>
