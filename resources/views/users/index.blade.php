@extends('layouts.app')

@section('body')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Список Пользователей</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Добавить Пользователя</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <!-- столбцы -->
                <th>#</th>
                <th>ФИО</th>
                <th>Электронная почта</th>
                <th>Возраст</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count() > 0)
            @foreach($users as $rs)
            <!-- вытягиваем иконки отсюда -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <tr>
        <td class="align-middle">{{ $loop->iteration }}</td>
        <td class="align-middle">{{ $rs->name }}</td>
        <td class="align-middle">{{ $rs->email }}</td>
        <td class="align-middle">{{ $rs->age }}</td>
        <td class="text-right align-middle">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('users.show', $rs->id) }}" type="button" class="btn btn-secondary">
                    <i class="fas fa-info-circle"></i>
                </a>
                <!-- иконка детали -->
                <a href="{{ route('users.edit', $rs->id)}}" type="button" class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                    <!-- иконка редактировать -->
                </a>
                <form action="{{ route('users.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Удалить????')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger p-0">
                        <i class="fas fa-trash-alt"></i>
                        <!-- иконка трэш -->
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

            @else
                <tr>
                    <td class="text-center" colspan="5">Пользователь не найден</td>
                    <!-- если в бд нету пользователей -->
                </tr>
            @endif
        </tbody>
    </table>
@endsection
