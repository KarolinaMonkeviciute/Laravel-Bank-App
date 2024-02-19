@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Sąskaitos</h1>
                        <p>Bendras likutis sąskaitose: {{ $totalBalance }} Eur</p>
                        <p>{{ $client->name }}</p>
                        <p>{{ $client->surname }}</p>
                        <p>Asmens kodas: {{ $client->code }}</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Sąskaitos numeris</th>
                                <th>Suma</th>
                                <th>Veiksmai</th>
                            </tr>
                            @forelse ($accounts as $account)
                                <tr>
                                    <td>{{ $account->account_number }}</td>
                                    <td>{{ $account->balance }} Eur</td>
                                    <td><a class="btn btn-success m-1"
                                            href="{{ route('accounts-editAmount', ['account' => $account, 'action' => 'add']) }}">Pridėti
                                            lėšų</a>
                                        <a class="btn btn-danger m-1"
                                            href="{{ route('accounts-editAmount', ['account' => $account, 'action' => 'withdraw']) }}">Nuimti
                                            lėšų</a>
                                        <a class="btn btn-secondary m-1"
                                            href="{{ route('accounts-delete', $account) }}">Ištrinti sąskaitą</a>
                                    </td>
                                @empty
                                    <b>Sąskaitų nėra</b>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Klieto sąskaitos')
