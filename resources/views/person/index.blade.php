@extends('layouts.master')
@section('content')
<div class="table-responsive-md">
    <table class="table table-striped">
        <thead>
            <tr>
                <td colspan="3" class="text-center">
                    <a href="{{route('person.create')}}" class="btn btn-primary">Novo</a>
                </td>
            </tr>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th class="text-center">...</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{!!$item->id!!}</td>
                <td>{!!$item->name!!}</td>
                <th class="text-center">
                    <a href="{{route('person.edit', ['id' => $item->id])}}" class="btn btn-warning">Alterar</a>
                </th>
            </tr>
            @empty
            <tr>
                <td colspan="3">Nenhum registro</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-center">
                {!! $data->links() !!}
                </td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection