@extends('layout')

@section('content')


    <div class="listings">
        @if (count($listings) == 0)
            <p>
                no listings found
            </p>
        @endif

        @foreach ($listings as $listing)
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
            <a href="/listing/{{$listing->id}}/edit" class="btn btn-primary col-3">
                Edit
            </a>
        
            {{-- for delete --}}
            <form action="/listing/{{$listing->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger col-3 mt-2">
                    Delete
                </button>
            </form>
        @endforeach

        <div class="pagination">
            {{ $listings->links() }}
        </div>
    </div>

@endsection
