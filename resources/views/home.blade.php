@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Banko statistika</div>

                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                                    aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                                    aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                                    aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <h2>Klientų skaičius banke:</h2>
                                    <h3>{{ $clientsCount }}<h3>
                                </div>
                                <div class="carousel-item">
                                    <h2>Sąskaitų skaičius banke:</h2>
                                    <h3>{{ $accountsCount }}<h3>
                                </div>
                                <div class="carousel-item">
                                    <h2>Banke laikomų lėšų suma:</h2>
                                    <h3>{{ $ammountInBank }} Eur<h3>
                                </div>
                                <div class="carousel-item">
                                    <h2>Didžiausia suma sąskaitoje:</h2>
                                    <h3>{{ $biggestAmount }} Eur<h3>
                                </div>
                                <div class="carousel-item">
                                    <h2>Vidutinė suma sąskaitoje:</h2>
                                    <h3>{{ $averageBalance }} Eur<h3>
                                </div>
                                <div class="carousel-item">
                                    <h2>Sąskaitų su nulinėmis lėšomis kiekis:</h2>
                                    <h3>{{ $zeroBalanceAccouts }}<h3>
                                </div>
                                <div class="carousel-item">
                                    <h2>Sąskaitų su neigiamu likučiu kiekis:</h2>
                                    <h3>{{ $negativeBalanceAccounts }}<h3>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
