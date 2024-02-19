@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Pridėti naują sąskaitą</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('accounts-store') }}" method="post">
                            <div class="form-group mb-3">
                                <label>Klientas</label>
                                <select class="form-select" name="client_id">
                                    <option selected value="0">Pasirinkite klientą</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->name }} {{ $client->surname }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Pasirinkite klientą</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Sąskaitos numeris</label>
                                <input type="text" name="account_number" class="form-control"
                                    value="{{ $account_number }}" readonly>
                                <small class="form-text text-muted">Sugeneruotas sąskaitos numeris</small>
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

@section('title', 'Pridėti naują sąskaitą')
