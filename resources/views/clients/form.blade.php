@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">
            @if(isset($edit) && $edit === true)
                {{ __('translation.clients.edit.title') }}
            @else
                {{ __('translation.clients.create.title') }}
            @endif
        </h1>
        <div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="client-form" method="post"
                @if(isset($edit) && $edit === true)
                    action="{{ route('clients.update', $client->id) }}"
                @else
                    action="{{ route('clients.store') }}"
                @endif
            >
                @if(isset($edit) && $edit === true)
                    @method('PATCH')
                @endif
                @csrf
                <div class="form-group">
                    <label for="Imie">
                        {{ __('translation.clients.columns.Imie') }}
                    </label>
                    <input type="text"
                        class="form-control"
                        name="Imie",
                        @if(isset($client->Imie))
                            value="{{ $client->Imie }}"
                        @else
                            value="{{ old('Imie') }}"
                        @endif
                    />
                </div>
                <div class="form-group">
                    <label for="Nazwisko">
                        {{ __('translation.clients.columns.Nazwisko') }}
                    </label>
                    <input type="text"
                        class="form-control"
                        name="Nazwisko",
                        
                        @if(isset($client->Nazwisko))
                            value="{{ $client->Nazwisko }}"
                        @else
                            value="{{ old('Nazwisko') }}"
                        @endif
                    />
                </div>
                <div class="form-group">
                    <label for="NumerTelefonu">
                        {{ __('translation.clients.columns.NumerTelefonu') }}
                    </label>
                    <input type="text"
                        class="form-control"
                        name="NumerTelefonu"
                        @if(isset($client->NumerTelefonu))
                            value="{{ $client->NumerTelefonu }}"
                        @else
                            value="{{ old('NumerTelefonu') }}"
                        @endif
                    />
                </div>
                <a href="{{ route('clients.index') }}" type="button"
                    class="btn btn-secondary">
                    {{ __('translation.buttons.cancel') }}
                </a>
                <button type="submit" class="btn btn-primary">
                    @if(isset($edit) && $edit === true)
                        {{ __('translation.buttons.update') }}
                    @else
                        {{ __('translation.buttons.create') }}
                    @endif
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
