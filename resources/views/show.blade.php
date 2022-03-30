@extends('master.layout')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card h-100">
                        <img src="{{ asset($post->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                        </div>
                    </div>
                    <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-warning">
                        Modifier
                    </a>
                    <form id="{{ $post->id }}" action="{{ route('post.delete', $post->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button onclick="event.preventDefault();
                            if(confirm('Are you sure ?'))
                            document.getElementById({{ $post->id }}).submit();" class="btn btn-danger"
                        type="submit">Supprimer</button>
                </div>
            </div>
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
