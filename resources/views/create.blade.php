@extends('layout')

@section('content')
    <div class="container mt-5">
        <form class="row g-3 d-flex justify-content-center" action="/listings" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">company name</label>
                <input type="text" name="company" class="form-control" id="inputEmail4" placeholder="Planet01"
                    value="{{ old('company') }}">
                @error('company')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">job title</label>
                <input type="text" name="title" class="form-control" id="inputPassword4"
                    placeholder="Software engineer" value="{{ old('title') }}">
                @error('title')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Job location</label>
                <input type="text" name="location" class="form-control" id="inputAddress" placeholder="karachi"
                    value="{{ old('location') }}">
                @error('location')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Website URL</label>
                <input type="url" name="website" class="form-control" id="inputAddress2"
                    placeholder="https://getbootstrap.com/" value="{{ old('website') }}">
                @error('url')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Tags (comma seprated)</label>
                <input type="text" name="tags" class="form-control" id="inputCity" placeholder="vue, react, angular"
                    value="{{ old('tags') }}">
                @error('tags')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="xyz@gmail.com"
                    value="{{ old('email') }}">
                @error('email')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Company Logo</label>
                <input type="file" name="logo" class="form-control" id="inputCity">
                @error('logo')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="inputZip" class="form-label">Job description</label>
                <textarea name="description" class="form-control" id="inputZip" cols="30" rows="10" placeholder="Lorem Ipsum"
                    value="{{ old('description') }}"></textarea>
                @error('description')
                    <span style="color: rebeccapurple">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-warning">Create</button>
            </div>
        </form>
    </div>
@endsection
