@extends('sub-Views.mainlayout')

<link rel="stylesheet" href="{{asset('/css/ratingpage.css')}}">

@section('navigation-bar')
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a href="#All_ratings" class="nav-link">Alle Bewertungen</a>
        </li>
        <li class="nav-item">
            <a href="#create_rating" class="nav-link">Erstelle Rating</a>
        </li>
    </ul>
@endsection

@section('one')
    <div class="m-5 text-center" id="All_ratings">
        <h4 class="my-5 fw-bold text-center">Guten Tag, wir versuchen so transparent wie möglich zu sein, daher werden hier alle unsere Bewertungen unserer Kunden angezeigt.</h4>
        @include('sub-Views.rating-table')
    </div>
@endsection

@section('two')
    <div class="m-5" id="create_rating">
        <h4 class="my-5fw-bold text-center">Um uns stetig zu verbessern sind uns Bewertungen sehr wichtig. Falls Sie bei uns gegessen haben, würden wir uns über eine Rückmeldung sehr freuen.</h4>
        @include('sub-Views.rating-form')
    </div>
@endsection
