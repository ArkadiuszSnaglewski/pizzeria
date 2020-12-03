@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-12">
        <div>
            <a style="margin: 19px;" href="{{ route('clients.create')}}"
                class="btn btn-primary">
                {{ __('translation.clients.index.buttons.create') }}
            </a>
        </div>

        <h1 class="display-3">{{ __('translation.clients.index.title') }}</h1>
        <table class="table table-striped">
        <thead>
            <tr>
              <td>{{ __('translation.clients.columns.id') }}</td>
              <td>{{ __('translation.clients.columns.Imie') }}</td>
              <td>{{ __('translation.clients.columns.Nazwisko') }}</td>
              <td>{{ __('translation.clients.columns.NumerTelefonu') }}</td>
              <td>{{ __('translation.columns.created_at') }}</td>
              <td>{{ __('translation.columns.updated_at') }}</td>
              <td>{{ __('translation.columns.deleted_at') }}</td>
              <td colspan = 2>{{ __('translation.columns.actions') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>
                    @if(!isset($client->deleted_at))
                        <a href="{{ route('clients.show',$client->id)}}"
                            class="btn btn-primary">
                            {{$client->Imie}}
                        </a>
                    @else
                        {{$client->Imie}}
                    @endif
                </td>
                <td>{{$client->Nazwisko}}</td>
                <td>{{$client->NumerTelefonu}}</td>
                <td>{{$client->created_at}}</td>
                <td>{{$client->updated_at}}</td>
                <td>{{$client->deleted_at}}</td>
                <td>
                    @if(!isset($client->deleted_at))
                        <a href="{{ route('clients.edit',$client->id)}}"
                            class="btn btn-primary">
                            {{ __('translation.buttons.edit') }}
                        </a>
                    @endif
                </td>
                <td>
                    @if(!isset($client->deleted_at))
                        <form action="{{ route('clients.destroy', $client->id)}}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                type="submit">
                                {{ __('translation.buttons.delete') }}
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
    </div>
@endsection
