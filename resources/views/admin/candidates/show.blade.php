@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center mb-5">
            <img class="rounded" src="https://via.placeholder.com/200" alt="">
        </div>
        <div class="col-sm-12">
            <h1 class="text-center">{{ $user->name . ' ' . $user->surname }}</h1>
        </div>
        <div class="col-sm-12 d-flex justify-content-center">
            <span><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></span>
            <span>&nbsp;|&nbsp;</span>
            <span><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            <span>PESEL: {{ $user->PESEL }}</span>
            <span>&nbsp;|&nbsp;</span>
            <span>Data urodzenia: {{ $user->birth_date }}</span>
            <span>&nbsp;|&nbsp;</span>
            <span>NIP: {{ $user->NIP }}</span>
            <span>&nbsp;|&nbsp;</span>
            <span>Ocena: <strong>{{ $user->assessment }}</strong></span>
            <span>&nbsp;|&nbsp;</span>
            <span>Adres: {{ $user->address }}</span>
        </div>
    </div>
    <div class="row mt-3 mb-5">
        <div class="col-sm-12 d-flex justify-content-center">
            <a target="_blank" rel="noopener noreferrer" href="/storage/cv/{{ $user->PESEL.'/'.$user->cv }}"><h4>Zobacz CV</h4></a>
        </div>
    </div>
    <div class="row justify-content-between mt-5">
        <div class="col-md-6 mt-2 mb-1">
            <h4>O mnie</h4>
            <p>{{ $user->bio }}</p>
            <hr>
        </div>
        <div class="col-md-6 mt-2 mb-1">
            <h4>Umiejętności</h4>
            <p>{{ $user->skills }}</p>
            <hr>
        </div>
        <div class="col-md-6 mt-2 mb-1">
            <h4>Doświadczenie</h4>
            <p>{{ $user->experience }}</p>
            <hr>
        </div>
        <div class="col-md-6 mt-2 mb-1">
            <h4>Zainteresowania</h4>
            <p>{{ $user->interests }}</p>
            <hr>
        </div>
    </div>
@stop
