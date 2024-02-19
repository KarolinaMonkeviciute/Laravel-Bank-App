@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Pervedimai tarp sąskaitų</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('accounts-transfer') }}" method="post">
                            <div class="form-group mb-3">
                                <label>Pervesti iš:</label>
                                <select class="form-select" name="toWithdraw">
                                    <option selected value="0">Pasirinkite klientą</option>
                                    @foreach ($clients as $client)
                                        @foreach ($client->accounts as $account)
                                            <option value="{{ $account->id }}">
                                                {{ $client->name }} {{ $client->surname }} -
                                                Sąskaita: {{ $account->account_number }} |
                                                Likutis: {{ $account->balance }} Eur
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pasirinkite klientą iš kurio sąskaitos pervesite
                                    lėšas</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Pervesti į:</label>
                                <select class="form-select" name="toAdd">
                                    <option selected value="0">Pasirinkite klientą</option>
                                    @foreach ($clients as $client)
                                        @foreach ($client->accounts as $account)
                                            <option value="{{ $account->id }}">
                                                {{ $client->name }} {{ $client->surname }} -
                                                Sąskaita: {{ $account->account_number }} |
                                                Likutis: {{ $account->balance }} Eur
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pasirinkite klientą į kurio sąskaitą pervesite
                                    lėšas</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Suma</label>
                                <input type="number" name="amount" id="amount" class="form-control">
                                <small class="form-text text-muted">Įveskite sumą</small>
                            </div>
                            <button type="submit" class="btn btn-dark">Pervesti</button>
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

@section('title', 'Pavedimai tarp sąskaitų')
