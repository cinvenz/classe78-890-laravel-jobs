@extends('guest.layouts.base')

@section('content')
    <ol>
        @foreach ($listings as $listing)
            <li>{{ $listing->title }}</li>
        @endforeach
    </ol>
@endsection
