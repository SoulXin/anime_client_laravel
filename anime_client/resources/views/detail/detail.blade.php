@extends('welcome')

@section('content')
<div class="container mx-auto row mb-5 text-light" style="margin-top:65px;">
    <div class = "col-12 col-lg-9">
        <div class = "border border-dark rounded">
            <h1 class="text-center pt-1 pb-1 text-light bg bg-dark" style="border-bottom:1px solid black;">{{ $anime->nama_anime }}</h1>
            <!-- Keterangan Anime -->
            <div class="row px-2 mt-2 mb-2 ">
                <!-- Gambar -->
                <div class="col-12 col-lg-3">
                    <img src="https://thumbs.dreamstime.com/b/dark-street-wet-asphalt-reflections-rays-water-abstract-dark-blue-background-smoke-smog-empty-dark-scene-neon-light-161595727.jpg" style="height:200px;width:100%;"/>
                </div>
                <!-- Keterangasn -->
                <div class="col-12 col-lg-9">
                    <table>
                        <tr>
                            <th>Nama</th>
                            <td> : </td>
                            <td> {{ $anime->nama_anime }}</td>
                        </tr>
                        <tr>
                            <th>Status Anime</th>
                            <td> : </td>
                            <td> {{ $anime->status }}</td>
                        </tr>
                        <tr>
                            <th>Studio</th>
                            <td> : </td>
                            <td> {{ $anime->studio }}</td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td> : </td>
                            <td> {{ $anime->rating }}</td>
                        </tr>
                        <tr>
                            <th>Musim</th>
                            <td> : </td>
                            <td> {{ $anime->musim }}</td>
                        </tr>
                        <tr>
                            <th>Genre</th>
                            <td> : </td>
                            <td> 
                                @foreach($anime->genre as $genre)
                                    <span class="badge badge-dark p-2" style="cursor:pointer;">{{ $genre->nama_genre }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <span class="row mx-2 mb-4 border border-dark"></span>
            <!-- Sinopsis -->
            <div class="row px-5">
                <h3>Sinopsis</h3>
                <p>{{$anime->sinopsis}}</p>
            </div>
            <span class="row mx-2 mt-2 mb-4 border border-dark"></span>

            <!-- Jika status msh on going -->
            @if($anime->status == "Masih Tayang")
                <!-- Streaming -->
                <div>
                    <div class="px-4">
                        <div class="row">
                            <div class="dropdown mb-2 col-12 col-md-5">
                                <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Versi Ukuran : {{$size}}p (Episode {{$latest_episode->episode}})
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('detail_on_going.index',[$anime->id,360,$latest_episode->episode]) }}">360p</a>
                                    <a class="dropdown-item" href="{{ route('detail_on_going.index',[$anime->id,480,$latest_episode->episode]) }}">480p</a>
                                    <a class="dropdown-item" href="{{ route('detail_on_going.index',[$anime->id,720,$latest_episode->episode]) }}">720p</a>
                                </div>
                            </div>
                            <div class="mx-auto">
                                @if($latest_episode->episode !== 1)
                                    <a href="{{ route('detail_on_going_select_episode.index',[$anime->id, 360, $latest_episode->episode - 1]) }} ">
                                        <button class="btn btn-outline-info">Episode Sebelumnya</button>
                                    </a>
                                @endif
                                @if($latest_episode->episode !== count($on_going_episode))
                                    <a href="{{ route('detail_on_going_select_episode.index',[$anime->id, 360, $latest_episode->episode + 1]) }} ">
                                        <button class="btn btn-outline-info">Episode Selanjutnya</button>
                                    </a>
                                @endif
                            </div>

                            @if($size == 360)
                                <iframe class="mt-2" width="100%" height="500"
                                    src="{{$latest_episode->link_streaming_360}}">
                                </iframe>
                            @elseif($size == 480)
                                <iframe class="mt-2" width="100%" height="500"
                                    src="{{$latest_episode->link_streaming_480}}">
                                </iframe>
                            @elseif($size == 720)
                                <iframe class="mt-2" width="100%" height="500"
                                    src="{{$latest_episode->link_streaming_720}}">
                                </iframe>
                            @endif
                        </div>
                    </div>

                    <!-- Epi -->
                    <div class="col-12 px-3 mt-2 mb-2 episode_anime_inside">
                    <p class="bg bg-dark rounded pt-1 pb-1 pl-2">Episode : </p>
                        <div class = "border border-dark rounded" style="height:250px;overflow:auto;">
                            @if($anime->status == "Masih Tayang")
                                @foreach($on_going_episode as $link_episode)
                                    <a class="text-light" href="{{ route('detail_on_going_select_episode.index',[$anime->id, 360, $link_episode->episode]) }}" style="text-decoration:none;">
                                        <div class="mt-2 mb-2 mx-2">
                                            <div class="border border-dark text-center">
                                                <span>{{ $anime->nama_anime }}</span><br/>
                                                <span>Episode {{ $link_episode->episode }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                @foreach($on_going_episode as $link_episode)
                                    <a class="text-light" href="{{ route('detail_complete_select_episode.index',[$anime->id, 360, $link_episode->episode]) }}" style="text-decoration:none;">
                                        <div class="mt-2 mb-2 mx-2">
                                            <div class="border border-dark text-center">
                                                <span>{{ $anime->nama_anime }}</span><br/>
                                                <span>Episode {{ $link_episode->episode }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    
                    <!-- Link Download -->
                    <div class="row px-5 mt-3 mb-3">
                        <p class="col-12 bg bg-dark rounded text-center pt-1 pb-1">Link Download Anime {{ $anime->nama_anime ." Episode ". $latest_episode->episode }} : </p>
                        <a href="{{$latest_episode->link_360}}" target="_blank" class="mb-1 col-12 col-md-4">
                            <button class="btn btn-info w-100">Googledrive 360</button>
                        </a>                
                        <a href="{{$latest_episode->link_480}}" target="_blank" class="mb-1 col-12 col-md-4">
                            <button class="btn btn-info w-100">Googledrive 480</button>
                        </a>                
                        <a href="{{$latest_episode->link_720}}" target="_blank" class="mb-1 col-12 col-md-4">
                            <button class="btn btn-info w-100">Googledrive 720</button>
                        </a>
                    </div>
                </div>
            <!-- Jika status sudah complete -->
            @else
                <div>
                    <div class="px-4">
                        <div class="row">
                            <div class="dropdown  mb-2 col-12 col-md-5">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Versi Ukuran : {{$size}}p (Episode {{$select_episode->episode}})
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('detail_complete.index',[$anime->id,360,$select_episode->episode]) }}">360p</a>
                                    <a class="dropdown-item" href="{{ route('detail_complete.index',[$anime->id,480,$select_episode->episode]) }}">480p</a>
                                    <a class="dropdown-item" href="{{ route('detail_complete.index',[$anime->id,720,$select_episode->episode]) }}">720p</a>
                                </div>
                            </div>
                            <div class="ml-auto">
                                @if($select_episode->episode !== 1)
                                    <a href="{{ route('detail_complete_select_episode.index',[$anime->id, 360, $select_episode->episode - 1]) }} ">
                                        <button class="btn btn-outline-info">Episode Sebelumnya</button>
                                    </a>
                                @endif
                                @if($select_episode->episode !== count($on_going_episode))
                                    <a href="{{ route('detail_complete_select_episode.index',[$anime->id, 360, $select_episode->episode + 1]) }} ">
                                        <button class="btn btn-outline-info">Episode Selanjutnya</button>
                                    </a>
                                @endif
                            </div>
                            @if($size == 360)
                                <iframe class="mt-2" width="100%" height="500"
                                    src="{{$select_episode->link_streaming_360}}">
                                </iframe>
                            @elseif($size == 480)
                                <iframe class="mt-2" width="100%" height="500"
                                    src="{{$select_episode->link_streaming_480}}">
                                </iframe>
                            @elseif($size == 720)
                                <iframe class="mt-2" width="100%" height="500"
                                    src="{{$select_episode->link_streaming_720}}">
                                </iframe>
                            @endif
                        </div>
                    </div>

                    <!-- Epi -->
                    <div class="col-12 px-3 mt-2 mb-2 episode_anime_inside">
                    <p class="bg bg-dark rounded pt-1 pb-1 pl-2">Episode : </p>
                        <div class = "border border-dark rounded" style="height:250px;overflow:auto;">
                            @if($anime->status == "Masih Tayang")
                                @foreach($on_going_episode as $link_episode)
                                    <a class="text-light" href="{{ route('detail_on_going_select_episode.index',[$anime->id, 360, $link_episode->episode]) }}" style="text-decoration:none;">
                                        <div class="mt-2 mb-2 mx-2">
                                            <div class="border border-dark text-center">
                                                <span>{{ $anime->nama_anime }}</span><br/>
                                                <span>Episode {{ $link_episode->episode }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                @foreach($on_going_episode as $link_episode)
                                    <a class="text-light" href="{{ route('detail_complete_select_episode.index',[$anime->id, 360, $link_episode->episode]) }}" style="text-decoration:none;">
                                        <div class="mt-2 mb-2 mx-2">
                                            <div class="border border-dark text-center">
                                                <span>{{ $anime->nama_anime }}</span><br/>
                                                <span>Episode {{ $link_episode->episode }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Link Download Episode -->
                    <!-- 360 -->
                    <div class="row px-5 mt-3 mb-3">
                        <p class="col-12 pt-1 pb-1 border border-dark rounded bg bg-dark">Link Download Anime {{ $anime->nama_anime }} (360p - EPISODE) : </p>
                        @foreach($on_going_episode as $episode)
                            <a class="col-2 col-md-1" onclick="console.log( {{ $episode->link_360 }} )">
                                <button class="btn btn-outline-info">{{ $episode->episode }}</button>
                            </a>
                        @endforeach
                    </div>

                    <!-- 480 -->
                    <div class="row px-5 mt-3 mb-3">
                        <p class="col-12 pt-1 pb-1 border border-dark rounded bg bg-dark">Link Download Anime {{ $anime->nama_anime }} (480p - EPISODE) : </p>
                        @foreach($on_going_episode as $episode)
                            <a class="col-1" onclick="console.log( {{ $episode->link_480 }} )">
                                <button class="btn btn-outline-info">{{ $episode->episode }}</button>
                            </a>
                        @endforeach
                    </div>

                    <!-- 720 -->
                    <div class="row px-5 mt-3 mb-3">
                        <p class="col-12 pt-1 pb-1 border border-dark rounded bg bg-dark">Link Download Anime {{ $anime->nama_anime }} (720p - EPISODE) : </p>
                        @foreach($on_going_episode as $episode)
                            <a class="col-1" onclick="console.log( {{ $episode->link_720 }} )">
                                <button class="btn btn-outline-info">{{ $episode->episode }}</button>
                            </a>
                        @endforeach
                    </div>

                    <!-- Link Download Batch -->
                    <div class="row px-5 mt-3 mb-3">
                        <p class="col-12 pt-1 pb-1 border border-dark rounded bg bg-dark text-center">Link Download Anime {{ $anime->nama_anime }} (BATCH) : </p>
                        <a href="{{$complete->link_360}}" target="_blank" class="col">
                            <button class="btn btn-info w-100">Googledrive 360</button>
                        </a>                
                        <a href="{{$complete->link_480}}" target="_blank" class="col">
                            <button class="btn btn-info w-100">Googledrive 480</button>
                        </a>                
                        <a href="{{$complete->link_720}}" target="_blank" class="col">
                            <button class="btn btn-info w-100">Googledrive 720</button>
                        </a>
                    </div>
                </div>
            @endif



            <!-- Random Anime -->
            <div class="row px-3 mb-3 mt-5 random_anime">
                <div class="col-12 px-3">
                    <h2 class="bg bg-dark pl-2 rounded pt-1 pb-1">Random Anime : </h2>
                </div>
                @foreach($random_animes as $random_anime)
                    <a href="{{ route('detail_on_going.index',[$random_anime->id,360,'latest']) }}" class="col text-center">
                        <div class="border border-dark">
                            <img src="https://thumbs.dreamstime.com/b/dark-street-wet-asphalt-reflections-rays-water-abstract-dark-blue-background-smoke-smog-empty-dark-scene-neon-light-161595727.jpg" style="width:100%;height:150px;"/>
                            <p class="mt-2" style="height:35px;">{{ $random_anime->nama_anime }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class = "col-12 col-lg-3 episode_anime">
        <p class="pt-1 pb-1 pl-1 bg bg-dark rounded">Episode : </p>
        <div class = "border border-dark rounded" style="height:250px;overflow:auto;">
            @if($anime->status == "Masih Tayang")
                @foreach($on_going_episode as $link_episode)
                    <a class="text-light" href="{{ route('detail_on_going_select_episode.index',[$anime->id, 360, $link_episode->episode]) }}" style="text-decoration:none;">
                        <div class="mt-2 mb-2 mx-2">
                            <div class="border border-dark text-center">
                                <span>{{ $anime->nama_anime }}</span><br/>
                                <span>Episode {{ $link_episode->episode }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                @foreach($on_going_episode as $link_episode)
                    <a class="text-light" href="{{ route('detail_complete_select_episode.index',[$anime->id, 360, $link_episode->episode]) }}" style="text-decoration:none;">
                        <div class="mt-2 mb-2 mx-2">
                            <div class="border border-dark text-center">
                                <span>{{ $anime->nama_anime }}</span><br/>
                                <span>Episode {{ $link_episode->episode }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection