@extends('layout')


@section('content')
    <div class="image">
        <img src="{{ $singleListing->logo ? asset('storage/' . $singleListing->logo) : asset('images/no-img.jpg') }}" alt=""
            height="230">
    </div>
    <h3>
        {{ $singleListing['title'] }}
    </h3>

    <p>
        {{ $singleListing['description'] }}
    </p>

    {{-- <a href="/listing/{{$singleListing->id}}/edit" class="btn btn-primary col-3">
        Edit
    </a>

    <form action="/listing/{{$singleListing->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger col-3 mt-2">
            Delete
        </button>
    </form> --}}
@endsection
