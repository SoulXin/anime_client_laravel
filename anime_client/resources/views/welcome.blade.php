<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="/css/app.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <style>
        #scroll {
            position:fixed;
            right:10px;
            bottom:10px;
            cursor:pointer;
            width:50px;
            height:50px;
            border:3px solid #3498db;
            text-indent:-9999px;
            display:none;
            -webkit-border-radius:60px;
            -moz-border-radius:60px;
            border-radius:60px
        }
        #scroll span {
            position:absolute;
            top:50%;
            left:50%;
            margin-left:-8px;
            margin-top:-12px;
            height:0;
            width:0;
            border:8px solid transparent;
            border-bottom-color:#3498db;
        }
        #scroll span:hover {
            border:8px solid transparent;
            border-bottom-color:black;
        }
        #scroll:hover {
            background-color:#3498db;
            opacity:1;filter:"alpha(opacity=100)";
            -ms-filter:"alpha(opacity=100)";
        }
        body{
            background-color:#18191a;
        }
        .pagination > li > a{
            background-color: white;
            color: #5A4181;
        }

        .pagination > li > a:focus,
        .pagination > li > a:hover,
        .pagination > li > span:focus,
        .pagination > li > span:hover{
            color: #343a40;
            background-color: #eee;
            border-color: #ddd;
        }

        .pagination > .active > a{
            color: white;
            background-color: #343a40 !Important;
            border: solid 1px #343a40 !Important;
        }

        .pagination > .active > a:hover{
            background-color: #343a40 !Important;
            border: solid 1px #343a40;
        }
        @media (min-width: 0px) and (max-width: 409px) { 
            .anime_description,
            .anime_genre,
            .line_break,
            .anime_season{
                display:none;
            }
            .anime_container{
                padding:20px;
                text-align:center;
            }
            .image_container{
                height:200px;
            }
            .anime_name{
                padding-top:5px;
                padding-bottom:4px;
                font-size:12px;
            }
            .rating_season_anime{
                position:absolute;
                top:-190px;
            }
            .anime_rating{
                font-size:12px;
            }

            /* Detail */
            .random_anime,
            .episode_anime{
                display:none;
            }

            /* Selengkapnya */
            .selengkapnya_rank{
                display:none;
            }
        }
        @media (min-width: 410px) and (max-width: 767px) { 
            .anime_description,
            .anime_genre,
            .line_break{
                display:none;
            }
            .anime_container{
                padding:20px;
                text-align:center;
            }
            .image_container{
                height:200px;
            }
            .anime_name{
                padding-top:5px;
                padding-bottom:4px;
                font-size:16px;
            }
            .rating_season_anime{
                position:absolute;
                top:-190px;
            }
            .anime_rating,
            .anime_season{
                font-size:14px;
            }

            /* Detail */
            .random_anime,
            .episode_anime{
                display:none;
            }

            /* Selengkapnya */
            .selengkapnya_rank{
                display:none;
            }
        }
        @media (min-width: 768px) and (max-width: 1023px) {
            .anime_description{
                display:none;
            }
            .anime_container{
                padding:20px;
                text-align:center;
            }
            .anime_rating,
            .anime_season{
                font-size:16px;
            }

            /* Detail */
            .episode_anime{
                display:none;
            }

            /* Selengkapnya */
            .selengkapnya_rank{
                display:none;
            }
        }
        @media (min-width: 1024px) { 
            .anime_link{
                display:none;
            }

            /* Detail */
            .episode_anime_inside{
                display:none;
            }
         }
        </style>
    </head>
    <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="{{route('index')}}">Warung Anime</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Anime</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manga</a>
                </li> -->
            </ul>
            <span>&nbsp;</span>
            <div class="navbar-nav col-12 col-lg-2">
                <button class="btn btn-danger w-100">Lapor Link Rusak</button>
            </div>

            <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('search.index')}}">
                @csrf
                
                <input id="search" type="text" class="form-control mr-2 @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" placeholder="cari nama anime" required autocomplete="off">
                <button class="btn btn-outline-info my-2 my-sm-0 " type="submit">CarI</button>
            </form>
        </div>
    </nav>

    <main class="pt-5 pb-5">
        @yield('content')
        <a href="#" id="scroll" style="display: none;"><span></span></a>
    </main>

    <footer class="bg bg-dark text-light p-2 pb-2 pt-2 text-center">
        Warung Anime Created @2021
    </footer>
    
    <script src="/js/app.js"></script>
    <script>    
        $(document).ready(function(){ 
            $(window).scroll(function(){ 
                if ($(this).scrollTop() > 50) { 
                    $('#scroll').fadeIn(); 
                } else { 
                    $('#scroll').fadeOut(); 
                } 
            }); 
            $('#scroll').click(function(){ 
                $("html, body").animate({ scrollTop: 0 }, 750); 
                return false; 
            }); 
        });
    </script>
    </body>
</html>
