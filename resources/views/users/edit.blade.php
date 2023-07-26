@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Редактировать пользователя</h1>
    <hr />
    <form action="{{ route('users.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">ФИО</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $users->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $users->email }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Возраст</label>
                <input type="text" name="age" class="form-control" placeholder="Age" value="{{ $users->age }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Обновить</button>
            </div>
        </div>
    </form>
@endsection
