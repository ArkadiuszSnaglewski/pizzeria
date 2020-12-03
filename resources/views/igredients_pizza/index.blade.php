@extends('layouts.app')

@section('content')
    <div class="row">
    <div class="col-sm-12">
        <div>ingredients_pizzas
            <a style="margin: 19px;" href="{{ route('ingredients_pizzas.create')}}"
                class="btn btn-primary">
                {{ __('translation.ingredients_pizzas.index.buttons.create') }}
            </a>
        </div>

        <h1 class="display-3">{{ __('translation.ingredients_pizzas.index.title') }}</h1>
        <table class="table table-striped">
        <thead>
            <tr>
              <td>{{ __('translation.ingredients_pizzas.columns.id') }}</td>
              <td>{{ __('translation.ingredients_pizzas.columns.Nazwa') }}</td>
              <td>{{ __('translation.columns.created_at') }}</td>
              <td>{{ __('translation.columns.updated_at') }}</td>
              <td>{{ __('translation.columns.deleted_at') }}</td>
              <td colspan = 2>{{ __('translation.columns.actions') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($ingredients_pizzas as $ingredient_pizza)
            <tr>
                <td>{{$ingredient_pizza->id}}</td>
                <td>
                    @if(!isset($ingredient_pizza->deleted_at))
                        <a href="{{ route('ingredients_pizzas.show',$ingredient_pizza->id)}}"
                            class="btn btn-primary">
                            {{$ingredient->Nazwa}}
                        </a>
                    @else
                        {{$ingredient_pizza->Nazwa}}
                    @endif
                </td>
                <td>{{$ingredient_pizza->created_at}}</td>
                <td>{{$ingredient_pizza->updated_at}}</td>
                <td>{{$ingredient_pizza->deleted_at}}</td>
                <td>
                    @if(!isset($ingredient_pizza->deleted_at))
                        <a href="{{ route('ingredients_pizzas.edit',$ingredient_pizza->id)}}"
                            class="btn btn-primary">
                            {{ __('translation.buttons.edit') }}
                        </a>
                    @endif
                </td>
                <td>
                    @if(!isset($ingredient_pizza->deleted_at))
                        <form action="{{ route('ingredients_pizzas.destroy', $ingredient_pizza->id)}}"
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
