@php
    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');
    $index = 0;
@endphp
<div class="fixed-bottom d-none" id="audio-display" >
    <audio controls class="w-100" id="audio-div">
        <source src="" id="audio-source" type="audio/mpeg">
      Your browser does not support the audio element.
      </audio>
</div>
@foreach ($data['surah'] as $s)
@php
    $number_arabic = str_replace($western_arabic, $eastern_arabic, $s['verses_count']);
    $surah_number = str_replace($western_arabic, $eastern_arabic, $s['id']);
@endphp
    

    <div class="col-md-4 col-12  mb-3">
        <div class="row justify-content-center">
                <div class="col-11 surah-card border rounded">
                    <a  style="text-decoration:none;" onclick="ChangeAudio('{{$data['audio'][$index]['audio_url']}}')" >
                        @php
                            $index++;
                        @endphp
                        <div class="row p-3 justify-content-center">
                            <div class="col-2 rounded"style="height: 3.5rem;text-align:center;padding-top: 0.9rem;background-color: #d6d5d5a1;">
                                <span style="color: black;">{{$surah_number}}</span>
                            </div>
                            <div class="col-8">
                                @php
                                $name_arabic = sprintf('%03d', $s['id'])
                                @endphp
                                <h2 style="font-family: surrahname;color:  black;margin-bottom:0%">{{$name_arabic}}</h2>
                                <small style="color: black;">{{$s['name_simple']}}</small>
                            </div>
                            
                            <div class="col-2 rounded-circle"style="height: 3.5rem;text-align:center;padding-top: 0.9rem;background-color: #d6d5d5a1;">
                                <span style="color: black;"><i class="fa-solid fa-play"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            
    
        </div>
    </div>
@endforeach
@section('script-func')
    <script>
        var audio = document.getElementById('audio-div');
        var source = document.getElementById('audio-source');
        var audio_div = document.getElementById('audio-display');
        function ChangeAudio(surah)
        {   
            source.src = surah;
            audio_div.classList.remove("d-none");
            audio.load();
            audio.play();
        }
    </script>
    
@endsection