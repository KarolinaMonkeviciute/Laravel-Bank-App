@if (session('ok'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('ok') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endif
