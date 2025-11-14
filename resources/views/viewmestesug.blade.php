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
            <th>Denumire</th>
            <th>Descriere</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tipuriMestesugs as $tipuriMestesug)
            <tr>
                <td>{{ $tipuriMestesug->denumire }}</td>
                <td>{{ $tipuriMestesug->descriere }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
