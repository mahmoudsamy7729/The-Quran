<?php

namespace App\Http\Controllers;
use Http;
use Config;

use Illuminate\Http\Request;

class SurahController extends Controller
{
    public function GetAllSurah()
    {
        $surah = Http::get(Config::get('services.api.api_url_v4').'/chapters?language=en')->json()['chapters'];
        return view('index',['surah' => $surah]);
        
    }
    public function GetSurah($id)
    {
        $surah = Http::get(Config::get('services.api.api_url_v3').'/chapters/'.$id.'/verses?page=1')->json();
        $audio = $this->GetAudio($id);
        $name =  $this->GetSurahName($id);
        $ayah = Http::get("https://api.quran.com/api/v4/verses/by_chapter/1?page=1&words=true&word_fields=text_uthmani&audio=4")->json();
        #dd($name);
        $data = [
            'surah' => $surah,
            'audio' => $audio,
            'id'    => $id,
            'name'  => $name,
        ];
        return view('read-surah',['data'=>$data]);
    }
    public function GetPageOfSurah($id,$page)
    {
        $surah = Http::get(Config::get('services.api.api_url_v3').'/chapters/'.$id.'/verses?page='.$page)->json()['verses'];
        return response()->json([
            'surah' => $surah,
        ]);

    }
    public function GetAudio($id)
    {
        $audio = Http::get(Config::get('services.api.api_url_v4').'/chapter_recitations/7/'.$id)->json()['audio_file'];
        return $audio;
    }
    public function GetSurahName($id)
    {
        $name = Http::get(Config::get('services.api.api_url_v4').'/chapters/'.$id.'?language=en')->json()['chapter']['name_simple'];
        return $name;
    }
    public function SurahTransalte($id)
    {
        $surah = Http::get(Config::get('services.api.api_url_v4').'/verses/by_chapter/'.$id.'?page=1&words=true&word_fields=text_uthmani')->json();
        #dd($surah);
        $audio = $this->GetAudio($id);
        $name =  $this->GetSurahName($id);
        $data = [
            'surah' => $surah,
            'audio' => $audio,
            'name'  => $name,
            'id'    => $id,
        ];
        #dd($data['surah']);
        return view('translation-surah',['data'=>$data]);
    }
    public function SurahTransaltePage($id,$page)
    {
        $surah = Http::get(Config::get('services.api.api_url_v4').'/verses/by_chapter/'.$id.'?page='.$page.'&words=true&word_fields=text_uthmani')->json();
        #dd($surah);
        $audio = $this->GetAudio($id);
        $name =  $this->GetSurahName($id);
        $data = [
            'surah' => $surah,
            'audio' => $audio,
            'name'  => $name,
            'id'    => $id,
        ];
        #dd($data['surah']);
        return view('translation-surah',['data'=>$data]);
    }
    public function NextPageTranslate($id,$page)
    {
        $surah = Http::get(Config::get('services.api.api_url_v4').'/verses/by_chapter/'.$id.'?page='.$page.'&words=true&word_fields=text_uthmani')->json()['verses'];
        return response()->json([
            'surah' => $surah,
        ]);
    }
}

