
@extends('layout')

@extends('content')

    <h1>{{ $title }}</h1>

    @if (count($items) > 0)

    <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th>ID</td>
                    <th>Vārds</td>
                    <th>&nbsp;</td>
                </tr>
            </thead>
            <tbody>

            @foreach($items as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>Labot / Dzēst</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    
    @else

        <p>Nav atrasts neviens saraksts</p>

    @endif

    <a herf="/authors/create" >Izveidot jaunu</a>

@endsection