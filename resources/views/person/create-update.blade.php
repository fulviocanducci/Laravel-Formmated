@extends('layouts.master')
@section('content')
@include('layouts.errors')
<form method="POST" action="{{route('person.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if (isset($data))
    <input type="hidden" id="id" name="id" value="{{$data->id}}" />
    @endif
    <div class="row">
        <div class="mb-3 col-6">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="{{isset($data) ? $data->name: old('name')}}" autofocus>
        </div>
        <div class="mb-3 col-3">
            <label for="value" class="form-label">Valor</label>
            <input type="text" class="form-control" id="value" name="value" placeholder="Digite o valor" value="{{isset($data) ? $data->value: old('value')}}">
        </div>
        <div class="mb-3 col-3">
            <label for="birthday" class="form-label">Aniversário</label>
            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Digite o aniversário"  value="{{isset($data) ? $data->birthday: old('birthday')}}">
        </div>
        <div class="mb-3 col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="status" value="1" id="status" @if(isset($data) && $data->status == 1) {{'checked'}} @endif>
                <label class="form-check-label" for="status">
                    Status
                </label>
            </div>
        </div>
        <div class="mb-3 col-12">
            <button type="submit" class="btn btn-primary">
                @if(!isset($data)) {{'Inserir'}} @else {{'Alterar'}} @endif
            </button>
            <a class="btn btn-danger" href="{{route('person.index')}}">Voltar</a>
        </div>
    </div>    
</form>
@endsection