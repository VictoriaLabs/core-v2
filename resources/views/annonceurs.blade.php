@extends('layouts.admin')

@section('main-content')
    <body data-user-id="{{ $userId }}">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Contrat') }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mes contrats</h6>
        </div>

        <div class="card-body">
            @foreach($contracts as $contract)
                <p>Destinataire: {{ $contract->receiver->name }}</p>
                <p>Événement: {{ $contract->event }}</p>
                <p>Action: {{ $contract->action }}</p>
                <p>Message: {{ $contract->message }}</p>
                <i class="fas fa-trash text-danger delete-icon" style="cursor: pointer;" data-contract-id="{{ $contract->id }}"></i>
                <hr>
            @endforeach
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Configurateur de contrat</h6>
        </div>

        <div class="card-body">
            <form id="contractForm" method="POST" action="{{ route('annonceurs') }}">
                @csrf

                <div class="form-group">
                    <label for="receiver_user_id">Destinataire:</label>
                    <select id="receiver_user_id" name="receiver_user_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="event">Événement:</label>
                    <select id="event" name="event" class="form-control">
                        <option value="event_1">Event 1</option>
                        <option value="event_2">Event 2</option>
                        <option value="event_3">Event 3</option>
                        <!-- Options pour les événements -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="action">Action:</label>
                    <select id="action" name="action" class="form-control" onchange="handleActionChange(this)">
                        <option value="">Sélectionnez une action</option>
                        <option value="sendMessage">Envoyer un message</option>
                        <!-- Options pour les actions -->
                    </select>
                </div>

                <div class="form-group" id="messageGroup" style="display: none;">
                    <label for="message">Message:</label>
                    <input type="text" id="message" name="message" class="form-control">
                </div>

                <button type="button" id="addBtn" class="btn btn-primary">Ajouter</button>
            </form>

            <table id="contractTable" class="table mt-4">
                <thead>
                <tr>
                    <th>Événement</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <!-- Les lignes du tableau seront ajoutées ici -->
                </tbody>
            </table>

            <button type="button" id="saveBtn" class="btn btn-success mt-4">Sauvegarder</button>
            <div id="loader" class="spinner-border text-success" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
{{--        <pre id="contractDisplay" class="mt-4"></pre>--}}
    </div>
    </body>
@endsection
