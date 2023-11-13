<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use Config;

class RecitersController extends Controller
{
    public function RecitersPage()
    {
        return view('reciters');
    }
    public function RecitersSuarhPage($id)
    {
        $surah = Http::get(Config::get('services.api.api_url_v4').'/chapters?language=en')->json()['chapters'];
        $audio = $this->GetAudio($id);
        #dd($audio);
        $data = [
            'surah' => $surah,
            'audio' => $audio,
        ];
        return view('listen-surah',['data' => $data]);
    }
    public function GetAudio($id)
    {
        $audio = Http::get(Config::get('services.api.api_url_v4').'/chapter_recitations/'.$id.'?language=en')->json()['audio_files'];
        return $audio;
    }
}
