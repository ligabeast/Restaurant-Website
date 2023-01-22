@extends('sub-Views.mainlayout')

<link rel="stylesheet" href="{{asset('/css/adminpanel.css')}}">

@section('navigation-bar')
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a href="#shown_ratings" class="nav-link">Bewertung hervorheben</a>
        </li>
        <li class="nav-item">
            <a href="#user_list" class="nav-link">Benutzer Liste</a>
        </li>
        <li class="nav-item">
            <a href="#Ticket" class="nav-link">Ticket-Anfragen</a>
        </li>
    </ul>
@endsection

@section('one')
    <div class="container" id="shown_ratings">
        <h3 class="text-center my-5 fw-bold">Anzeigen von Bewertungen</h3>
        @include('sub-Views.rating-table-admin')
    </div>
@endsection

@section('two')
    <div class="container" id="user_list">
        <h3 class="text-center my-5 fw-bold">Benutzer Liste</h3>
        @include('sub-Views.userlist')
    </div>
@endsection

@section('three')
    <div class="container" id="Ticket">
        <h3 class="text-center my-5 fw-bold">Tickets</h3>
        @include('sub-Views.ticket-table')
    </div>
@endsection
