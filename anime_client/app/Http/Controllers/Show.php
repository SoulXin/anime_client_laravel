<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anime;
use App\Genre;
use App\Anime_Rank;
use App\Female_Rank;
use App\Male_Rank;

class Show extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = Anime::with('genre')->get();
        $anime_on_going = [];
        $anime_complete = [];
        foreach($animes as $anime){
            if($anime->status == "Masih Tayang" && count($anime_on_going) < 6){
                array_push($anime_on_going,$anime);
            }else if($anime->status == "Selesai Tayang" && count($anime_complete) < 6){
                array_push($anime_complete,$anime);
            }
        }
        $female_rank = Female_Rank::all();
        $male_rank = Male_Rank::all();
        $anime_rank = Anime_Rank::all();

        return view('main', [
            'anime_on_going' => $anime_on_going,
            'anime_complete' => $anime_complete,
            'animes' => $animes,
            'female_rank' => $female_rank,
            'male_rank' => $male_rank,
            'anime_rank' => $anime_rank
        ]);
    }

    public function episode_index($id,$size,$episode){
        $random_animes = Anime::inRandomOrder()->limit(4)->get();
        $anime = Anime::with('genre')->find($id);
        if($episode == "latest"){
            $latest_episode = Anime::find($id)->googledrive_episode()->orderBy('updated_at', 'desc')->first();
        }else{
            $latest_episode = Anime::find($id)->googledrive_episode()->where('episode',$episode)->first();
        }
        $googledrive_episode = Anime::find($id)->googledrive_episode;
        return view('detail.detail',[
            'anime' => $anime,
            'random_animes' => $random_animes,
            'latest_episode' => $latest_episode,
            'size' => $size,
            'on_going_episode' => $googledrive_episode,
        ]);
    }

    public function select_episode_index($id,$size,$episode){
        $random_animes = Anime::inRandomOrder()->limit(4)->get();
        $anime = Anime::with('genre')->find($id);
        $select_episode = Anime::find($id)->googledrive_episode->where('episode',$episode)->first();
        $googledrive_episode = Anime::find($id)->googledrive_episode;
        return view('detail.detail',[
            'anime' => $anime,
            'random_animes' => $random_animes,
            'latest_episode' => $select_episode,
            'size' => $size,
            'on_going_episode' => $googledrive_episode,
        ]);
    }

    public function complete_index($id,$size,$episode){
        $random_animes = Anime::inRandomOrder()->limit(4)->get();
        $anime = Anime::with('genre')->find($id);
        $googledrive_episode = Anime::find($id)->googledrive_episode;
        $googledrive_complete = Anime::find($id)->googledrive_complete;
        $select_episode = Anime::find($id)->googledrive_episode->where('episode',$episode)->first();
        
        return view('detail.detail',[
            'anime' => $anime,
            'random_animes' => $random_animes,
            'select_episode' => $select_episode,
            'on_going_episode' => $googledrive_episode,
            'complete' => $googledrive_complete,
            'size' => $size
        ]);
    }

    public function select_complete_episode_index($id,$size,$episode){
        $random_animes = Anime::inRandomOrder()->limit(4)->get();
        $anime = Anime::with('genre')->find($id);
        $select_episode = Anime::find($id)->googledrive_episode->where('episode',$episode)->first();
        $googledrive_episode = Anime::find($id)->googledrive_episode;
        $googledrive_complete = Anime::find($id)->googledrive_complete;
        return view('detail.detail',[
            'anime' => $anime,
            'random_animes' => $random_animes,
            'select_episode' => $select_episode,
            'on_going_episode' => $googledrive_episode,
            'complete' => $googledrive_complete,    
            'size' => $size,
        ]);
    }

    public function selengkapnya_index($status){
        $animes = Anime::where('status',$status)->paginate(12);
        $female_rank = Female_Rank::all();
        $male_rank = Male_Rank::all();
        $anime_rank = Anime_Rank::all();

        return view('selengkapnya',[
            'animes' => $animes,
            'female_rank' => $female_rank,
            'male_rank' => $male_rank,
            'anime_rank' => $anime_rank,
            'status' => $status
        ]);
    }

    public function selengkapnya_detail_index($status,$id,$size){
        if($status == "Masih Tayang"){
            return $this->episode_index($id,'360','latest');
        }else{
            return $this->complete_index($id,'360','1');
        }
    }

    public function search_index(Request $request){
        $animes = Anime::where('nama_anime','like','%' . $request->search . '%')->paginate(12);
        $female_rank = Female_Rank::all();
        $male_rank = Male_Rank::all();
        $anime_rank = Anime_Rank::all();

        return view('selengkapnya',[
            'animes' => $animes,
            'female_rank' => $female_rank,
            'male_rank' => $male_rank,
            'anime_rank' => $anime_rank
        ]);
    }
}
