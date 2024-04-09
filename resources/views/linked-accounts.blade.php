@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800">{{ __('Linked accounts') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <!-- Discord card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s fw-bold text-primary text-uppercase mb-1">Discord</div>
                            <div class="text-s mb-2">Account ➜ <span class="text-s fw-bold">{{ "Pseudo" }}</span></div>
                            <form method="POST" action="#">
                                @csrf
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">Link account</label><br>
                            </form>
                            {{-- <form method="POST" action="#">
                                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" checked>
                                <label class="btn btn-outline-danger" for="danger-outlined" >Unlink</label>
                            </form> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fa-brands fa-discord fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Twitch card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s fw-bold text-primary text-uppercase mb-1">Twitch</div>
                            <div class="text-s mb-2">Account ➜ <span class="text-s fw-bold">{{ "Pseudo" }}</span></div>
                            <form method="POST" action="#">
                                @csrf
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">Link account</label><br>
                            </form>
                            {{-- <form method="POST" action="#">
                                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" checked>
                                <label class="btn btn-outline-danger" for="danger-outlined" >Unlink</label>
                            </form> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fa-brands fa-twitch fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kick card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s fw-bold text-success text-uppercase mb-1">Kick</div>
                            <div class="text-s mb-2">Account ➜ <span class="text-s fw-bold">{{ "Pseudo" }}</span></div>
                            <form method="POST" action="#">
                                @csrf
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">Link account</label><br>
                            </form>
                            {{-- <form method="POST" action="#">
                                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" checked>
                                <label class="btn btn-outline-danger" for="danger-outlined" >Unlink</label>
                            </form> --}}
                        </div>
                        <div class="col-auto">
                            <svg width="35" height="35" viewBox="0 0 440 440" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M33.2617 18.3331H169.263V108.222H213.04V62.1092H259.152V18.3331H392.817V151.999H349.041V198.112H302.928V241.888H349.041V288.002H392.817V421.666H259.152V377.89H213.04V331.778H169.263V421.666H33.2617V18.3331Z" fill="#dee2e6"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Youtube card  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s fw-bold text-danger text-uppercase mb-1">Youtube</div>
                            <div class="text-s mb-2">Account ➜ <span class="text-s fw-bold">{{ "Pseudo" }}</span></div>
                            <form method="POST" action="#">
                                @csrf
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">Link account</label><br>
                            </form>
                            {{-- <form method="POST" action="#">
                                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" checked>
                                <label class="btn btn-outline-danger" for="danger-outlined" >Unlink</label>
                            </form> --}}
                        </div>
                        <div class="col-auto">
                            <i class="fa-brands fa-youtube fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
