@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Pridėti lėšų</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('accounts-amountUpdate', ['account' => $account, 'action' => 'add']) }}"
                            method="post">
                            <div class="form-group mb-3">
                                <label>Vardas</label>
                                <input type="text" name="name" class="form-control" value="{{ $client->name }}"
                                    readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label>Pavardė</label>
                                <input type="text" name="surname" class="form-control" value="{{ $client->surname }}"
                                    readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label>Sąskaitos likutis</label>
                                <input type="text" name="balance" class="form-control" value="{{ $account->balance }}"
                                    readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label>Pridėti lėšų</label>
                                <input type="number" name="amount" id="amount" class="form-control">
                                <small class="form-text text-muted">Įveskite norimų pridėti lėšų skaičių</small>
                            </div>
                            <button type="submit" class="btn btn-primary m-1">Pridėti</button>
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Atšaukti</a>
                            @csrf
                            @method('put')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('accounts.confirm')
    </div>
@endsection

@section('title', 'Lėšų pridėjimas')
