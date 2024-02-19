@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Klientai</h1>
                        <form action="{{ route('clients-index') }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group mb-3">
                                            <label class="m-2">Rūšiavimas</label>
                                            <select class="form-select mt-2" name="sort">
                                                @foreach ($sorts as $sortKey => $sortValue)
                                                    <option value="{{ $sortKey }}"
                                                        @if ($sortBy == $sortKey) selected @endif>
                                                        {{ $sortValue }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-dark mt-5">Rodyti</button>
                                            <a href="{{ route('clients-index') }}"
                                                class="btn btn-secondary mt-5 ms-2">Pradinis</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Asmens kodas</th>
                                <th>Veiksmai</th>
                            </tr>
                            @forelse ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->surname }}</td>
                                    <td>{{ $client->code }}</td>
                                    <td>
                                        <a class="btn btn-secondary m-1"
                                            href="{{ route('clients-edit', $client) }}">Redaguoti</a>
                                        <a class="btn btn-danger m-1"
                                            href="{{ route('clients-delete', $client) }}">Ištrinti</a>
                                        <a class="btn btn-dark m-1"
                                            href="{{ route('clients-show', $client) }}">Peržiūrėti</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Klientų nėra</td>
                                </tr>
                            @endforelse
                        </table>
                        <div>
                            <form action="{{ route('accounts-taxes') }}" method="post">
                                <button type="submit" class="btn btn-dark m-1">Nuskaičiuoti mokesčius</button>
                                @csrf
                                @method('put')
                                <form>
                        </div>
                        <div class="mt-3">
                            {{ $clients->appends(['sort' => $sortBy])->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('title', 'Visi klientai')
