@extends('layouts.front')
@section('content')
    <div class="row mt-5">
        <div class="col">
            <h1>Edytuj Swoje dane<br>
                <small class="text-muted" style="font-size: 0.4em"> Data rejestracji: {{ $user->created_at }}</small>
            </h1>
        </div>
        <div class="col">
            {{ Html::linkRoute('password.request', 'Zmień hasło', null, ['class' => 'btn btn-primary btn-lg float-right']) }}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card p-3">
                {!! Form::model($user, ['route' => 'myaccount.update', 'method'=>'PATCH', 'files' => true]) !!}
                {{ Form::label('name', 'Imię')  }}
                {{ Form::text('name', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('surname', 'Nazwisko')  }}
                {{ Form::text('surname', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('email', 'Email')  }}
                {{ Form::email('email', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('cv', 'CV')  }}
                {{ Form::file('cv', ['class'=>'form-control mb-3']) }}
                <small id="cvHelp" class="form-text text-muted mb-3">Obecnie wgrane CV: <strong>{{ $user->cv }}</strong></small>

                {{ Form::label('phone', 'Nr telefonu')  }}
                {{ Form::text('phone', null, ['class'=>'form-control']) }}
                <small id="phoneHelp" class="form-text text-muted mb-3">Numer telefonu w formacie +48000000000</small>

                {{ Form::label('PESEL', 'PESEL')  }}
                {{ Form::number('PESEL', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('NIP', 'NIP')  }}
                {{ Form::number('NIP', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('address', 'Adres')  }}
                {{ Form::text('address', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('birth_date', 'Data urodzenia')  }}
                {{ Form::date('birth_date', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('bio', 'O mnie')  }}
                {{ Form::textarea('bio', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('interests', 'Zainteresowania')  }}
                {{ Form::textarea('interests', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('skills', 'Umiejętności')  }}
                {{ Form::textarea('skills', null, ['class'=>'form-control mb-3']) }}

                {{ Form::label('experience', 'Doświadczenie')  }}
                {{ Form::textarea('experience', null, ['class'=>'form-control mb-3']) }}

                {{ Form::submit('Zapisz', ['class' => 'btn btn-success btn-success btn-block']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
