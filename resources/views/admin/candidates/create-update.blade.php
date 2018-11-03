@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            @if(isset($user))
               <h1>Edytuj: {{$user->name . ' ' . $user->surname}} <br>
                <small class="text-muted" style="font-size: 0.4em"> Data rejestracji: {{ $user->created_at }} | Data aktualizacji: {{ $user->updated_at }} </small>
               </h1>
            @else
                <h1>Dodaj nowego użytkownika</h1>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card p-3">
                @if(isset($user))
                    {!! Form::model($user, ['route' => ['candidates.update', $user->id], 'method'=>'PATCH', 'files' => true]) !!}
                @else
                    {!! Form::open(['route' => 'candidates.store', 'files' => true]) !!}
                @endif
                    {{ Form::label('name', 'Imię')  }}
                    {{ Form::text('name', null, ['class'=>'form-control mb-3']) }}

                    {{ Form::label('surname', 'Nazwisko')  }}
                    {{ Form::text('surname', null, ['class'=>'form-control mb-3']) }}

                    {{ Form::label('email', 'Email')  }}
                    {{ Form::email('email', null, ['class'=>'form-control mb-3']) }}

                    {{ Form::label('cv', 'CV')  }}
                    {{ Form::file('cv', ['class'=>'form-control mb-3']) }}
                    @if(isset($user))
                    <small id="cvHelp" class="form-text text-muted mb-3">Obecnie wgrane CV: <strong>{{ $user->cv }}</strong></small>
                    @endif

                    {{ Form::label('phone', 'Nr telefonu')  }}
                    {{ Form::text('phone', null, ['class'=>'form-control']) }}
                    <small id="phoneHelp" class="form-text text-muted mb-3">Numer telefonu w formacie +48000000000</small>

                    @if(!isset($user))
                        {{ Form::label('password', 'Hasło') }}
                        {{ Form::password('password', ['class'=>'form-control']) }}
                        <small id="passwordHelp" class="form-text text-muted mb-3">Hasło musi się składać z przynajmniej 6 znaków</small>
                        {{ Form::label('password_confirmation', 'Potwierdź hasło') }}
                        {{ Form::password('password_confirmation',['class'=>'form-control mb-3']) }}
                    @endif

                    {{ Form::label('assessment', 'Ocena')  }}
                    {{ Form::select('assessment', [1 => '1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6 => '6', 7=>'7', 8=>'8', 9=>'9', 10=>'10'], null, ['class'=>'form-control mb-3']) }}

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
