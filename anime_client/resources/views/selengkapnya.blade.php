@extends('welcome')

@section('content')
<div class="container row mx-auto mt-5">
    <div class="col-12 col-lg-9 px-4">
        <div class="row">
            @foreach($animes as $anime)
                <a href="{{ route('selengkapnya_detail.index',[$anime->status,$anime->id,'360']) }}" class="col-6 col-md-4 col-lg-3 text-light text-center mb-4">
                    <div class="border border-dark">
                        <img src="https://thumbs.dreamstime.com/b/dark-street-wet-asphalt-reflections-rays-water-abstract-dark-blue-background-smoke-smog-empty-dark-scene-neon-light-161595727.jpg" style="width:100%;height:150px;"/>
                        <p class="mt-2" style="height:35px;">{{ $anime->nama_anime }}</p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="mx-auto">
                {{$animes->links('pagination')}}
            </div>
        </div>
    </div>
    <div class="col-lg-3 px-0 selengkapnya_rank">
        @include('sidebar.index')
    </div>
</div>
@endsection