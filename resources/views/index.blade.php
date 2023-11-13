@extends('layouts.master')
@section('title','The Quran')
@section('content')
    @include('partials.header')
    @include('partials.sidebar')
    <main style="overflow-x: hidden;">
        <div class="row f-div" style="">
            <div class="col-12 quran" dir="rtl">
                <h2 class="text-center"> "وَإِذَا قُرِئَ الْقُرْآنُ فَاسْتَمِعُوا لَهُ وَأَنصِتُوا لَعَلَّكُمْ تُرْحَمُونَ "</h2>
                <h2 class="text-center">"مَن قرأَ حرفًا من كتابِ اللَّهِ فلهُ بهِ حَسَنةٌ والحسَنةُ بعشرِ أمثالِها"</h2>
            </div>
        </div>
            <h2 class="text-center quran fw-bold mt-3"> "إِنَّا نَحْنُ نـزلْنَا الذِّكْرَ وَإِنَّا لَهُ لَحَافِظُونَ"</h2>
            <div class="container mt-3" dir="rtl">
                <div class="row">
                    <nav>
                        <div class="nav nav-tabs pb-2 mb-5" style="border-color: #aa9523;" id="nav-tab" role="tablist">
                          <button  class="nav-link active nav-button" id="surah" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">سورة</button>
                          <button  class="nav-link nav-button" id="juze" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">جزء</button>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="surah">
                            <div class="row">
                                @include('partials.surah')    
                            </div>
        
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="juze">...</div>
                      </div>
                </div>
    </main>
@endsection