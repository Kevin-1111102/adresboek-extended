@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adresboek</h1>

        <a href="{{ route('adressen.create') }}" class="btn btn-primary mb-3">Adres toevoegen</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Straat</th>
                <th>Huisnummer</th>
                <th>Postcode</th>
                <th>Stad</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($adressen as $adres)
                <tr id="adres-{{ $adres->id }}">
                    <td>{{ $adres->naam }}</td>
                    <td>{{ $adres->straat }}</td>
                    <td>{{ $adres->huisnummer }}</td>
                    <td>{{ $adres->postcode }}</td>
                    <td>{{ $adres->stad }}</td>
                    <td>
                        <a href="{{ route('adressen.edit', $adres) }}" class="btn btn-warning btn-sm">Bewerk</a>
                        <button class="btn btn-danger btn-sm" onclick="verwijderAdres({{ $adres->id }})">Verwijder</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function verwijderAdres(id) {
            if (confirm('Weet je zeker dat je dit adres wilt verwijderen?')) {
                axios.delete('/adressen/' + id, {
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
                })
                    .then(response => {
                        if(response.data.success){
                            document.getElementById('adres-' + id).remove();
                        }
                    })
                    .catch(() => alert('Fout bij verwijderen'));
            }
        }
    </script>
@endsection
