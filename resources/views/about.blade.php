@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('About') }}</h1>

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card shadow mb-4">

                <div class="card-profile-image mt-4">
                    <img src="{{ asset('img/favicon.png') }}" class="rounded-circle" alt="user-image">
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">About VictoriaLabs</h5>
                            <p>Current version : </p>
                            <p>Dons ??</p>
                            <p>If you found this project useful, then please consider giving it a ⭐</p>
                            <a href="https://github.com/aleckrh/laravel-sb-admin-2" target="_blank" class="btn btn-warning">
                                <i class="fa-solid fa-mug-hot"></i> Give us a coffee
                            </a>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="font-weight-bold">Contact us</h5>
                            <p>If you have any questions, problems or advice, please contact us :</p>
                            <ul>
                                <li><a href="#" target="_blank">Contact</a> - label.</li>
                                <li><a href="#" target="_blank">Contact</a> - label.</li>
                                <li><a href="#" target="_blank">Contact</a> - label.</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
