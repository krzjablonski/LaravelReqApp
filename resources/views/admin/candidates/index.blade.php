@extends('layouts.admin')
@section('content')
    <div class="row justify-content-between">
        <div class="col">
            <h1>Wszyscy kandydaci</h1>
        </div>
        <div class="col">{{ Html::linkRoute('candidates.create', 'Dodaj nowego', [], ['class' => 'btn btn-primary btn-lg'])  }}</div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imię i Nazwisko</th>
                            <th scope="col">Email</th>
                            <th scope="col">PESEL</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th>{{$user->id}}</th>
                                <td>
                                    {{ $user->name . ' ' . $user->surname  }} <br>
                                    <small>{{ Html::linkRoute('candidates.show', 'zobacz profil', [$user->id], ['class' => 'text-muted'])  }}</small>
                                </td>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->PESEL }}</td>
                                <td>{{ $user->NIP }}</td>
                                <td>
                                    {{ Html::linkRoute('candidates.edit', 'Edytuj', [$user->id], ['class' => 'btn btn-outline-secondary btn-sm'])  }}
                                    {!! Form::open(['route'=>['candidates.destroy', $user->id], 'method'=>'DELETE', 'class' => 'form-inline d-inline-block']) !!}
                                        {{ Form::submit('Usuń', ['class' => 'btn btn-outline-danger btn-sm']) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@stop
