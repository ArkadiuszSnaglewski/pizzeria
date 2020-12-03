@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">
            @if(isset($edit) && $edit === true)
                {{ __('translation.ingredients.edit.title') }}
            @else
                {{ __('translation.ingredients.create.title') }}
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
            <form id="ingredient-form" method="post"
                @if(isset($edit) && $edit === true)
                    action="{{ route('ingredients.update', $ingredient->id) }}"
                @else
                    action="{{ route('ingredients.store') }}"
                @endif
            >
                @if(isset($edit) && $edit === true)
                    @method('PATCH')
                @endif
                @csrf
                <div class="form-group">
                    <label for="Nazwa">
                        {{ __('translation.ingredients.columns.Nazwa') }}
                    </label>
                    <input type="text"
                        class="form-control"
                        name="Nazwa",
                        @if(isset($ingredient->Nazwa))
                            value="{{ $ingredient->Nazwa }}"
                        @else
                            value="{{ old('Nazwa') }}"
                        @endif
                    />
                </div>
                <div class="form-group">
                    <label for="Cena">
                        {{ __('translation.ingredients.columns.Cena') }}
                    </label>
                    <input type="number"
                        class="form-control"
                        name="Cena",
                        step="0.01",
                        @if(isset($ingredient->Cena))
                            value="{{ $ingredient->Cena }}"
                        @else
                            value="{{ old('Cena') }}"
                        @endif
                    />
                </div>
                <a href="{{ route('ingredients.index') }}" type="button"
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
