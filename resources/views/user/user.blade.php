@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Edad</th>
                <th>Carnet</th>
                <th>Numero de celular</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->identity_card }}</td>
                    <td>{{ $user->cell_phone }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-link"><i class="fa fa-edit"></i></a>
                            @if($id != $user->id)
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection