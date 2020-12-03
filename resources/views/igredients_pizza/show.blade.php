@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">
            {{ __('translation.ingredients_pizzas.show.title') }}
        </h1>
        <div>
            {{ __('translation.ingredients_pizzas.columns.id') }}: {{ $ingredient_pizza->id }}<br/>
            {{ __('translation.ingredients_pizzas.columns.Nazwa') }}: {{ $ingredient_pizza->Nazwa }}<br/>
            {{ __('translation.columns.created_at') }}: {{ $ingredient_pizza->created_at }}<br/>
            {{ __('translation.columns.updated_at') }}: {{ $ingredient_pizza->updated_at }}<br/>
        </div>
        <div>
            <br/>
            <a href="{{ route('ingredients_pizzas.index') }}" type="button"
                class="btn btn-secondary">
                << {{ __('translation.ingredients_pizzas.show.buttons.ingredients_pizzas') }}
            </a>
        </div>
    </div>
</div>
@endsection
