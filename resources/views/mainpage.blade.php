<link rel="stylesheet" href="{{asset('/css/mainpage.css')}}">

@extends('sub-Views.mainlayout')

@section('navigation-bar')
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a href="#release" class="nav-link">Ankündigung</a>
        </li>
        <li class="nav-item">
            <a href="#food" class="nav-link">Speisen</a>
        </li>
        <li class="nav-item">
            <a href="#opinion" class="nav-link">Meinung</a>
        </li>
        <li class="nav-item">
            <a href="#contact" class="nav-link">Kontakt</a>
        </li>
    </ul>
@endsection

@include('sub-Views.login')
@include('sub-Views.register')

@section('one')
    <h3 class="text-center my-5 fw-bold" id="release">Ankündigung</h3>
    @include('sub-Views.release-text')
@endsection

@section('two')
    <h3 class="text-center my-5 fw-bold" id="food">Speisen</h3>
    @include('sub-Views.food-flex')
@endsection

@section('three')
    <h3 class="text-center my-5 fw-bold" id="opinion">Meinungen unserer Kunden</h3>
    @include('sub-Views.rating-table')
@endsection

@section('four')
    <h3 class="text-center my-5 fw-bold" id="contact">Kontakt</h3>
    @include('sub-Views.contact-form')
@endsection
