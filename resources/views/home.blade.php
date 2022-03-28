@extends('master.layout')

@section('title')
Home
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://cdn.pixabay.com/photo/2022/02/10/05/44/wuzhen-7004638__340.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title'] }}</h5>
                        <p class="card-text">{{ $post['body'] }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
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