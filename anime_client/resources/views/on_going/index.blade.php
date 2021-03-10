<div class="container-fluid mt-2">
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-brand">Anime On going</span>
        <div class="ml-auto">
            <a href="{{ route('selengkapnya.index','Masih Tayang') }}">
                <button class="btn btn-outline-info">Selengkapnya</button>
            </a>
        </div>
    </nav>
    <main class="border border-dark px-2">
        <div class="row mt-2 px-4">
            @foreach($anime_on_going as $anime)
                <div class="anime_container mb-2 col-6 col-md-6 col-lg-12">
                    <a href = "{{route('detail_on_going.index',[$anime->id,360,'latest'])}}" style="text-decoration:none;">
                        <div class="row border border-info rounded">
                            <div class="col-12 col-lg-3 px-0 image_container">
                                <img src="https://i.ytimg.com/vi/zAFVeNhM3kM/maxresdefault.jpg" class="card-img-top" alt="{{$anime->nama_anime}}" style="height: 100%;border-radius:5px 0px 0px 5px;">
                            </div>

                            <div class = "col-12 col-lg-9">
                                <h4 class="mt-2 text-light anime_name">{{ $anime->nama_anime }}</h4>
                                <p class="text-light anime_description">{{ substr($anime->sinopsis,0,50) }}...</p>
                                @foreach($anime->genre as $genre)
                                    <span class="badge badge-dark p-2 anime_genre" style="cursor:pointer;">{{ $genre->nama_genre }}</span>
                                @endforeach
                                <span class="row mx-2 mt-2 mb-4 border border-info line_break"></span>
                                <div class="row">
                                    <div class="mb-3 ml-3 rating_season_anime">
                                        <span class="badge badge-secondary anime_rating">
                                            <svg width="1em" height="1em" color="yellow" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            {{ $anime->rating }}
                                        </span>
                                        <span class="badge badge-secondary anime_season">
                                            {{ $anime->musim }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
</div>