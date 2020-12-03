@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">
            {{ __('translation.clients.show.title') }}
        </h1>
        <div>
            {{ __('translation.clients.columns.id') }}: {{ $client->id }}<br/>
            {{ __('translation.clients.columns.Imie') }}: {{ $client->Imie }}<br/>
            {{ __('translation.clients.columns.Nazwisko') }}: {{ $client->Nazwisko }}<br/>
            {{ __('translation.clients.columns.NumerTelefonu') }}: {{ $client->NumerTelefonu }}<br/>
            {{ __('translation.columns.created_at') }}: {{ $client->created_at }}<br/>
            {{ __('translation.columns.updated_at') }}: {{ $client->updated_at }}<br/>
        </div>
        <div>
            <br/>
            <a href="{{ route('clients.index') }}" type="button"
                class="btn btn-secondary">
                << {{ __('translation.clients.show.buttons.clients') }}
            </a>
        </div>
    </div>
</div>
@endsection
