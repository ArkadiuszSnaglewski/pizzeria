@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-12">
        <div>
            <a style="margin: 19px;" href="{{ route('ingredients.create')}}"
                class="btn btn-primary">
                {{ __('translation.ingredients.index.buttons.create') }}
            </a>
        </div>

        <h1 class="display-3">{{ __('translation.ingredients.index.title') }}</h1>
        <table class="table table-striped">
        <thead>
            <tr>
              <td>{{ __('translation.ingredients.columns.id') }}</td>
              <td>{{ __('translation.ingredients.columns.Nazwa') }}</td>
              <td>{{ __('translation.columns.created_at') }}</td>
              <td>{{ __('translation.columns.updated_at') }}</td>
              <td>{{ __('translation.columns.deleted_at') }}</td>
              <td colspan = 2>{{ __('translation.columns.actions') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($ingredients as $ingredient)
            <tr>
                <td>{{$ingredient->id}}</td>
                <td>
                    @if(!isset($ingredient->deleted_at))
                        <a href="{{ route('ingredients.show',$ingredient->id)}}"
                            class="btn btn-primary">
                            {{$ingredient->Nazwa}}
                        </a>
                    @else
                        {{$ingredient->Nazwa}}
                    @endif
                </td>
                <td>{{$ingredient->created_at}}</td>
                <td>{{$ingredient->updated_at}}</td>
                <td>{{$ingredient->deleted_at}}</td>
                <td>
                    @if(!isset($ingredient->deleted_at))
                        <a href="{{ route('ingredients.edit',$ingredient->id)}}"
                            class="btn btn-primary">
                            {{ __('translation.buttons.edit') }}
                        </a>
                    @endif
                </td>
                <td>
                    @if(!isset($ingredient->deleted_at))
                        <form action="{{ route('ingredients.destroy', $ingredient->id)}}"
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
