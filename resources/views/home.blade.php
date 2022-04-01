@extends('master.layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-2 mb-2">
                        <div class="card h-100">
                            <img src="{{ asset('./uploads/' . $post->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <h6 class="card-title">{{ $post->user ? $post->user->name : null }}</h6>
                                <p class="card-text">{{ Str::limit($post->body, 50) }}</p>
                                <a href=" {{ route('post.show', $post->slug) }} " class="btn btn-primary">Show more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection

@section('style')
    <style>
    </style>
@endsection
