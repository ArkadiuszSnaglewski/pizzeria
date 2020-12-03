@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-12">
        <div>
            <a style="margin: 19px;" href="{{ route('pizzas.create')}}"
                class="btn btn-primary">
                {{ __('translation.pizzas.index.buttons.create') }}
            </a>
        </div>

        <h1 class="display-3">{{ __('translation.pizzas.index.title') }}</h1>
        <table class="table table-striped">
        <thead>
            <tr>
              <td>{{ __('translation.pizzas.columns.id') }}</td>
              <td>{{ __('translation.pizzas.columns.NazwaPizza') }}</td>
              <td>{{ __('translation.pizzas.columns.CenaBazowa') }}</td>
              <td>{{ __('translation.pizzas.columns.Nazwa') }}</td>
              <td>{{ __('translation.columns.created_at') }}</td>
              <td>{{ __('translation.columns.updated_at') }}</td>
              <td>{{ __('translation.columns.deleted_at') }}</td>
              <td colspan = 2>{{ __('translation.columns.actions') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($pizzas as $pizza)
            <tr>
                <td>{{$pizza->id}}</td>
                <td>
                    @if(!isset($pizza->deleted_at))
                        <a href="{{ route('pizzas.show',$pizza->id)}}"
                            class="btn btn-primary">
                            {{$pizza->NazwaPizza}}
                        </a>
                    @else
                        {{$pizza->NazwaPizza}}
                    @endif
                </td>
                
                
                <td>{{$pizza->CenaBazowa}}</td>
                <td>{{$pizza->ingredients->Nazwa}}</td>
                <td>{{$pizza->created_at}}</td>
                <td>{{$pizza->updated_at}}</td>
                <td>{{$pizza->deleted_at}}</td>
                <td>
                    @if(!isset($pizza->deleted_at))
                        <a href="{{ route('pizzas.edit',$pizza->id)}}"
                            class="btn btn-primary">
                            {{ __('translation.buttons.edit') }}
                        </a>
                    @endif
                </td>
                <td>
                    @if(!isset($pizza->deleted_at))
                        <form action="{{ route('pizzas.destroy', $pizza->id)}}"
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
