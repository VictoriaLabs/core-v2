@extends('layouts.admin')

@section("title", "Oauth")

@section('main-content')
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add a service</h6>
            </div>
            <div class="card-body">
                <form action="{{ route("dashboard.oauth.add-service") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="form-control mb-3" name="service">
                            @forelse($services as $service)
                                <option value="{{ $service->id }}">{{ $service->btn_label }}</option>
                            @empty
                                <option disabled>Any services for now</option>
                            @endforelse
                        </select>

                        <div class="invalid-feedback">
                            @error('service')
                                {{ $message }}
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Add </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Linked at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                        @forelse($oauths as $oauth)
                            <tr>
                                <th scope="row">{{ $oauth->oauthService->btn_label  }}</th>
                                <td>{{ $oauth->created_at->format("d/m/Y H:i") }}</td>
                                <td>
                                    <form action="{{ route("dashboard.oauth.delete-oauth", $oauth) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center">Any Oauth linked</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
