@extends('layouts.site')

@section('title-block')СНТ НАРА@endsection('title-block')

@section('content')
    <h2>Документы</h2>
    @foreach($docs as $doc)
        <div class="card mb-4 bg-primary">
            <img src="//storage/{{ $doc }}">
        </div>
    @endforeach
@endsection('content')
