@php
    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
@endphp
@extends('layouts.master')
@section('title','surah '.$data['name'])
@section('content')
@include('partials.header')
@include('partials.sidebar')
<main style="overflow-x: hidden">
    <div class="row justify-content-center"  style="padding-top: 2rem">
        <div class="col-md-3 col-6 d-flex justify-content-center rounded-pill p-2 themes-div" >
            <a role="button" id="translation" onclick="translation()" class="btn btn-primary col-6 rounded-pill tra-div " id="translation" style="background: none;border: none;outline: none;" href="{{route('TranslateSurah',$data['id'])}}">Translation</a>
            <button type="button" onclick="reading()" class="btn btn-primary col-6 rounded-pill active-button tra-div" id="reading" style="background: none;border: none;outline: none;">Reading</button>
        </div>
    
        <div class="col-12">
            <input type="hidden" value="{{$data['id']}}" id="surah-id">

            @php
            $name_arabic = sprintf('%03d', $data['id'])
            @endphp
            <div class="fixed-bottom d-none" id="audio-div">
                <audio controls class="w-100" id="surah">
                    <source src="{{$data['audio']['audio_url']}}" type="audio/mpeg">
                  Your browser does not support the audio element.
                  </audio>
            </div>
            
            <p style="font-family: surrahname;text-align:center;font-size:4rem">{{$name_arabic}}sura</p>
            <h1 style="font-family: quran; text-align:center">بِسْمِ ٱللَّهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</h1>
            <div class="row justify-content-center">
                <div class="col-md-4 col-10">
                    <a href="#" onclick="listen()" id="listen" role="button" class="listen-surah surah-info" style="text-decoration: none;float:left;padding:5px;font-weight:bold;" ><i class="fa-solid fa-circle-info me-2"></i>Surah Info </a>
                    <a href="#" onclick="listen()" id="listen" role="button" class="listen-surah" style="text-decoration: none;float:right;padding:5px;" > <i class="fa-solid fa-headphones me-2"></i>الاستماع</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-10 mt-3" style="font-family: quran;text-align:center">
            <h4 style="font-weight:bold;line-height: 2.5rem;" id="surah-text">
                @foreach ($data['surah']['verses'] as $ayah)
                @php
                    $number_arabic = str_replace($western_arabic, $eastern_arabic, $ayah['verse_number']);
                @endphp
                    {{$ayah['text_madani']}}            {{$number_arabic}}

                @endforeach
            </h4>
            <small id="page-num">{{$data['surah']['pagination']['current_page']}}</small>
            @if ($data['surah']['pagination']['total_pages'] !=1)
            <div class="row justify-content-center" style="direction: rtl;margin-bottom: 1rem;">
                <button type="button" class="btn next-surah  col-5 ms-3" id="next-page"  onclick="NextPage();next();" > <i class="fa-solid fa-angle-right ms-2" style="margin-bottom: -2px;"></i>الصفحة التالية  </button>
                <button type="button" class="btn next-surah  col-5 d-none" id="perv-page" onclick="PervPage();perv()">الصفحة السابقة <i class="fa-solid fa-angle-left me-2" style="margin-bottom: -2px;"></i></button>
            </div>
            @endif
            
            <div class="row justify-content-center" style="direction: rtl;margin-bottom: 4rem;">
                @if ($data['id'] != 114)
                    <a role="button" href="{{route('surah',$data['id']+1)}}" class="btn next-surah col-5 ms-3" id="next-surah"><i class="fa-solid fa-angle-right ms-2" style="margin-bottom: -2px;"></i>السورة التالية </a>
                @endif
                @if ($data['id'] != 1)
                    <a role="button" href="{{route('surah',$data['id']-1)}}" class="btn next-surah  col-5"id="prev-surah">السورة السابقة <i class="fa-solid fa-angle-left me-2" style="margin-bottom: -2px;"></i></a>
                @endif

            </div>
            
            <hr>
            
            
          
            
        </div>

    </div>
</main>

    
@endsection
@section('script-func')
<script>
    
    function translation()
    {
        var reading = document.getElementById('reading');
        var translation = document.getElementById('translation');

        reading.classList.remove("active-button");
        translation.classList.add("active-button");
    }
    function reading()
    {
        var reading = document.getElementById('reading');
        var translation = document.getElementById('translation');

        reading.classList.add("active-button");
        translation.classList.remove("active-button");
    }
    function listen()
    {
        var audio_div =  document.getElementById('audio-div');
        var audio = document.getElementById('surah');
        audio_div.classList.remove("d-none");
        audio.play();
    }
    function next()
    {
        var PervPage = document.getElementById('perv-page');
        PervPage.classList.remove('d-none');
        var NextPage = document.getElementById('next-page');
        if(page_number == pages)
        {
            NextPage.classList.add('d-none');
        }
    }
    function perv()
    {
        var PervPage = document.getElementById('perv-page');
        var NextPage = document.getElementById('next-page');
        if(page_number == 1)
        {
            PervPage.classList.add('d-none');
        }
        NextPage.classList.remove('d-none');
    }
</script>
@endsection
@section('ajax')
    <script type="text/javascript">
    var pages = JSON.parse("{{ json_encode($data['surah']['pagination']['total_pages']) }}");
    var page_number = 1 ;
    var surah_id = document.getElementById('surah-id').value;   
    String.prototype.EntoAr= function() {
    return this.replace(/\d/g, d =>  '٠١٢٣٤٥٦٧٨٩'[d])
    }
        function NextPage()
    {
        page_number = page_number + 1 ;
        var url = "{{route('SurahPage',['id' =>11111,'page'=>22222])}}  ";
        url = url.replace('11111',surah_id).replace('22222',page_number);
        $(document).ready(function()
        {
            $.ajax(
                {
                    type: "GET",
                    url : url,
                    datatype: "json",
                    success: function(response)
                    { 
                        console.log(response);
                        document.getElementById('surah-text').innerHTML = "";
                        for(var i = 0 ; i < response['surah'].length ; i++)
                        {
                            let ayah_number = ""+response['surah'][i]['verse_number']+"";
                            document.getElementById('surah-text').append(response['surah'][i]['text_madani']+ayah_number.EntoAr())
                        }
                        $('html, body').animate({ scrollTop: 0 }, 'fast');
                        document.getElementById('page-num').innerHTML = page_number;
                    }
                }
            )
        })
    }
    function PervPage()
    {
        page_number = page_number - 1 ;
        var url = "{{route('SurahPage',['id' =>11111,'page'=>22222])}}  ";
        url = url.replace('11111',surah_id).replace('22222',page_number);
        $(document).ready(function()
        {
            $.ajax(
                {
                    type: "GET",
                    url : url,
                    datatype: "json",
                    success: function(response)
                    { 
                        console.log(response);
                        document.getElementById('surah-text').innerHTML = "";
                        for(var i = 0 ; i < response['surah'].length ; i++)
                        {
                            let ayah_number = ""+response['surah'][i]['verse_number']+"";
                            document.getElementById('surah-text').append(response['surah'][i]['text_madani']+ayah_number.EntoAr())
                        }
                        $('html, body').animate({ scrollTop: 0 }, 'fast');
                        document.getElementById('page-num').innerHTML = page_number;
                    }
                }
            )
        })
    }
    </script>
@endsection