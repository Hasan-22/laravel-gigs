@extends('layout')

@section('content')
    <h1>{{ $heading }}</h1>


    <div class="listings">
        @if (count($listingArray) == 0)
            <p>
                no listings found
            </p>
        @endif

        @foreach ($listingArray as $listing)
            <h3>
                <a href="/listing/{{ $listing['id'] }}">
                    {{ $listing['title'] }}
                </a>
            </h3>

            <div class="image">
                <img src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-img.jpg') }}"
                    alt="" height="230">
            </div>

            <p>
                {{ $listing->company }}
            </p>

            @php
                $tags = explode(',', $listing->tags);
            @endphp

            <ul>
                @foreach ($tags as $tag)
                    <li>
                        <a href="/?tag={{ $tag }}">
                            {{ $tag }}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="/">
                        All
                    </a>
                </li>
            </ul>

            <span>
                {{ $listing->location }}
            </span>
            <hr>
        @endforeach
    </div>

    <div class="pagination">
        {{ $listingArray->links() }}
    </div>
@endsection
