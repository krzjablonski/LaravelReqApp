@extends('layouts.front')
@section('content')
    <div class="row mt-5 justify-content-between">
        <div class="col">
            <h1>{{ $user->name . ' ' . $user->surname }}</h1>
        </div>
        <div class="col">
            {{ Html::linkRoute('myaccount.edit', 'Edytuj swoje dane', null, ['class' => 'btn btn-primary btn-lg float-right']) }}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3 order-md-2 mt-5">
            <h4>Moje dane:</h4>
            <ul class="list-group">
                <li class="list-group-item">Email:<br>{{ $user->email }}</li>
                <li class="list-group-item">Nr tel:<br>{{ $user->phone }}</li>
                <li class="list-group-item">Adres:<br>{{ $user->address }}</li>
                <li class="list-group-item">PESEL:<br>{{ $user->PESEL }}</li>
                <li class="list-group-item">NIP:<br>{{ $user->NIP }}</li>
                <li class="list-group-item">Data urodzenia:<br>{{ $user->birth_date }}</li>
                <li class="list-group-item">Wgrane CV: <a target="_blank" rel="noopener noreferrer" href="/storage/cv/{{ $user->PESEL . '/' . $user->cv }}">Zobacz</a></li>
            </ul>
        </div>
        <div class="col-md-9 order-md-1 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>Doświadczenie</h2>
                    <p>{{ $user->experience }}</p>
                </div>
                <div class="col-md-6">
                    <h2>Umiejętności</h2>
                    <p>{{ $user->skills }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>O mnie</h2>
                    <p>{{ $user->bio }}</p>
                </div>
                <div class="col-md-6">
                    <h2>Zainteresowania</h2>
                    <p>{{ $user->interests }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
