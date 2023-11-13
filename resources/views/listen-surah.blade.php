@extends('layouts.master')
@section('title','The Quran - Reciters')
@section('content')
    @include('partials.header')
    <main style="overflow-x: hidden;">
        <div class="row f-div" style="">
            <div class="col-12 quran" dir="rtl">
                <h2 class="text-center"> "وَإِذَا قُرِئَ الْقُرْآنُ فَاسْتَمِعُوا لَهُ وَأَنصِتُوا لَعَلَّكُمْ تُرْحَمُونَ "</h2>
                <h2 class="text-center">"مَن قرأَ حرفًا من كتابِ اللَّهِ فلهُ بهِ حَسَنةٌ والحسَنةُ بعشرِ أمثالِها"</h2>
            </div>
        </div>
            <h2 class="text-center quran fw-bold mt-3"> "إِنَّا نَحْنُ نـزلْنَا الذِّكْرَ وَإِنَّا لَهُ لَحَافِظُونَ"</h2>
            <div class="container mt-3" dir="rtl">
                <hr>
                <div class="row mb-5">
                    @include('partials.surah-reciters')

                </div>
            </div>
    </main>
@endsection