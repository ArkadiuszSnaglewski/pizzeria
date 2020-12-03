@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">
            {{ __('translation.pizzas.show.title') }}
        </h1>
        <div>
            {{ __('translation.pizzas.columns.id') }}: {{ $pizza->id }}<br/>
            {{ __('translation.pizzas.columns.NazwaPizza') }}: {{ $pizza->NazwaPizza }}<br/>
            {{ __('translation.columns.created_at') }}: {{ $pizza->created_at }}<br/>
            {{ __('translation.columns.updated_at') }}: {{ $pizza->updated_at }}<br/>
        </div>
        <div>
            <br/>
            <a href="{{ route('pizzas.index') }}" type="button"
                class="btn btn-secondary">
                << {{ __('translation.pizzas.show.buttons.pizzas') }}
            </a>
        </div>
    </div>
</div>
@endsection
