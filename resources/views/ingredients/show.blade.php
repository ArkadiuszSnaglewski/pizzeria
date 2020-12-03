@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">
            {{ __('translation.ingredients.show.title') }}
        </h1>
        <div>
            {{ __('translation.ingredients.columns.id') }}: {{ $ingredient->id }}<br/>
            {{ __('translation.ingredients.columns.Nazwa') }}: {{ $ingredient->Nazwa }}<br/>
            {{ __('translation.columns.created_at') }}: {{ $ingredient->created_at }}<br/>
            {{ __('translation.columns.updated_at') }}: {{ $ingredient->updated_at }}<br/>
        </div>
        <div>
            <br/>
            <a href="{{ route('ingredients.index') }}" type="button"
                class="btn btn-secondary">
                << {{ __('translation.ingredients.show.buttons.ingredients') }}
            </a>
        </div>
    </div>
</div>
@endsection
