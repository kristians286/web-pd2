
@extends('layout')

@extends('content')

    <h1>{{ $title }}</h1>

    @if (count($items) > 0)

        <table></table>
    
    @else

        <p>Nav atrasts neviens saraksts</p>

    @endif
@endsection