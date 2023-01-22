<link rel="stylesheet" href="{{asset('/css/myaccount.css')}}">

@extends('sub-Views.mainlayout')

@section('navigation-bar')
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a href="#ratings" class="nav-link">Meine Bewertungen</a>
        </li>
    </ul>
@endsection

@section('one')
    <h3 class="text-center my-5 fw-bold" id="ratings">Meine Bewertungen</h3>
    @include('sub-Views.rating-table-modify')
@endsection
