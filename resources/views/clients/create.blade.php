@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Pridėti naują klientą</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('clients-store') }}" method="post">
                            <div class="form-group mb-3">
                                <label>Vardas</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                <small class="form-text text-muted">Įveskite kliento vardą</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Pavardė</label>
                                <input type="text" name="surname" class="form-control" value="{{ old('surname') }}">
                                <small class="form-text text-muted">Įveskite kliento pavardę</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Asmens kodas</label>
                                <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                                <small class="form-text text-muted">Įveskite kliento asmens kodą</small>
                            </div>
                            <button type="submit" class="btn btn-dark">Pridėti</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Pridėti naują klientą')
