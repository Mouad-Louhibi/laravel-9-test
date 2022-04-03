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
                        <img src="{{ asset('./uploads/' . $post->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                        </div>
                    </div>
                    @if (auth()->check())
                        @if (auth()->user()->id === $post->user_id)
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning">
                                Modifier
                            </a>
                            <form id="{{ $post->id }}" action="{{ route('posts.destroy', $post->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-danger" type="submit" onclick="event.preventDefault();
                            if(confirm('Are you sure ?'))
                            document.getElementById({{ $post->id }}).submit();">Supprimer</button>
                        @endif
                    @endif
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
