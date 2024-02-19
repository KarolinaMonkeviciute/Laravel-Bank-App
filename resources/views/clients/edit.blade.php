@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Keisti kliento duomenis</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('clients-update', $client) }}" method="post">
                            <div class="form-group mb-3">
                                <label>Vardas</label>
                                <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                                <small class="form-text text-muted">Pakeiskite kliento vardą</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Pavardė</label>
                                <input type="text" name="surname" class="form-control" value="{{ $client->surname }}">
                                <small class="form-text text-muted">Pakeiskite kliento pavardę</small>
                            </div>
                            <button type="submit" class="btn btn-primary m-1">Keisti</button>
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Atšaukti</a>
                            @csrf
                            @method('put')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Kliento duomenų keitimas')
