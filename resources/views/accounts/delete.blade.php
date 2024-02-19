@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-header">Ar tikrai norite ištrinti sąskaitą {{ $account->account_number }}?</div>
                    <div class="card-body">
                        <form action="{{ route('accounts-destroy', $account) }}" method="post">
                            <button type="submit" class="btn btn-danger m-1">Ištrinti</button>
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Atšaukti</a>
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Patvirtinti ištrynimą')
