@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">
            @if(isset($edit) && $edit === true)
                {{ __('translation.pizzas.edit.title') }}
            @else
                {{ __('translation.pizzas.create.title') }}
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
            <form id="pizza-form" method="post"
                @if(isset($edit) && $edit === true)
                    action="{{ route('pizzas.update', $pizza->id) }}"
                @else
                    action="{{ route('pizzas.store') }}"
                @endif
            >
                @if(isset($edit) && $edit === true)
                    @method('PATCH')
                @endif
                @csrf
                <div class="form-group">
                    <label for="NazwaPizza">
                        {{ __('translation.pizzas.columns.NazwaPizza') }}
                    </label>
                    <input type="text"
                        class="form-control"
                        name="NazwaPizza",
                        @if(isset($pizza->NazwaPizza))
                            value="{{ $pizza->NazwaPizza }}"
                        @else
                            value="{{ old('NazwaPizza') }}"
                        @endif
                    />
                </div>
                <div class="form-group">
                    <label for="CenaBazowa">
                        {{ __('translation.pizzas.columns.CenaBazowa') }}
                    </label>
                    <input type="number"
                        class="form-control"
                        name="CenaBazowa",
                        step="0.01",
                        @if(isset($pizza->CenaBazowa))
                            value="{{ $pizza->CenaBazowa }}"
                        @else
                            value="{{ old('CenaBazowa') }}"
                        @endif
                    />
                </div>
                <div class="form-group">
                    <label for="IdSkladniki">
                        {{ __('translation.pizzas.columns.IdSkladniki') }}
                    </label>
                    <select class = "form-control custom-select" name ="IdSkladniki" >
                    <option> </option>
                    @foreach ($ingredients as $ingredient)
                    <option value= "{{$ingredient->id}}"
                    @if(isset($pizza->IdSkladniki)
                            && $pizza-> IdSkladniki===$ingredient->id)
                            selected
                        @elseif(old('IdSkladniki')
                            && old('IdSkladniki')===$ingredient->id)
                        selected
                        @endif
                    >
                    {{$ingredient->id}}
                    </option>
                    @endforeach
                    </select>
                    
                </div>
                <a href="{{ route('pizzas.index') }}" type="button"
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
