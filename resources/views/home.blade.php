@extends('master.layout')

@section('title')
Home
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-2 mb-2">
                <div class="card h-100">
                    <img src="{{ asset($post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->body, 50) }}</p>
                        <a href=" {{ route('post.show', $post->slug) }} " class="btn btn-primary">Go somewhere</a>
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