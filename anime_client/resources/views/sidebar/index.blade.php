<div class="container-fluid bg bg-dark rounded px-0 mt-2">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#female" role="tab" aria-controls="female" aria-selected="true">Female</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="male-tab" data-toggle="tab" href="#male" role="tab" aria-controls="male" aria-selected="false">Male</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="anime-tab" data-toggle="tab" href="#anime" role="tab" aria-controls="anime" aria-selected="false">Anime</a>
        </li>
    </ul>

    <div class="tab-content border border-dark" id="myTabContent" style="height:300px;overflow-y:scroll;">
        <!-- Female -->
        <div class="tab-pane fade show active" id="female" role="tabpanel" aria-labelledby="female-tab">
            @foreach($female_rank as $female)
            <div class="mb-2 px-3 mt-1">
                <div class="row border border-dark"  style="height:50px;">
                    <div class="col-3 bg bg-dark">
                        img
                    </div>
                    <div class="col-9 text-light">
                        @if(strlen($female->nama_karakter)>15)
                            <span>{{ substr($female->nama_karakter,0,15) }}...</span>
                        @else
                            <span>{{ $female->nama_karakter }}</span>
                        @endif
                        <div style = "position:absolute;right:0;bottom:0;">
                            @if($female->status == "Improved")
                                <svg width="2em" height="2em" color="green" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                </svg>
                            @elseif($female->status == "Declined")
                                <svg width="2em" height="2em" color="red" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                </svg>
                            @elseif($female->status == "Unchanged")
                                <svg width="2em" height="2em" color="blue" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                </svg>
                            @else
                                <svg width="2em" height="2em" color="green" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Male -->
        <div class="tab-pane fade" id="male" role="tabpanel" aria-labelledby="male-tab">
            @foreach($male_rank as $male)
                <div class="mb-2 px-3">
                    <div class="row border border-dark"  style="height:50px;">
                        <div class="col-3 bg bg-dark">
                            img
                        </div>
                        <div class="col-9 text-light">
                            @if(strlen($male->nama_karakter)>15)
                                <span>{{ substr($male->nama_karakter,0,15) }}...</span>
                            @else
                                <span>{{ $male->nama_karakter }}</span>
                            @endif
                            <div style = "position:absolute;right:0;bottom:0;">
                                @if($male->status == "Improved")
                                    <svg width="2em" height="2em" color="green" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                    </svg>
                                @elseif($male->status == "Declined")
                                    <svg width="2em" height="2em" color="red" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                    </svg>
                                @elseif($male->status == "Unchanged")
                                    <svg width="2em" height="2em" color="blue" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                @else
                                    <svg width="2em" height="2em" color="green" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Anime -->
        <div class="tab-pane fade" id="anime" role="tabpanel" aria-labelledby="anime-tab">
            @foreach($anime_rank as $anime)
                <div class="mb-2 px-3">
                    <div class="row border border-dark"  style="height:50px;">
                        <div class="col-3 bg bg-dark">
                            img
                        </div>
                        <div class="col-9 text-light">
                            @if(strlen($anime->nama_anime)>15)
                                <span>{{ substr($anime->nama_anime,0,15) }}...</span>
                            @else
                                <span>{{ $anime->nama_anime }}</span>
                            @endif
                            <div style = "position:absolute;right:0;bottom:0;">
                                @if($anime->status == "Improved")
                                    <svg width="2em" height="2em" color="green" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                    </svg>
                                @elseif($anime->status == "Declined")
                                    <svg width="2em" height="2em" color="red" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                    </svg>
                                @elseif($anime->status == "Unchanged")
                                    <svg width="2em" height="2em" color="blue" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                @else
                                    <svg width="2em" height="2em" color="green" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>