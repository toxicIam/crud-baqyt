@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Detail User</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">ФИО</label>
            <input type="text" name="name" class="form-control" placeholder="ФИО" value="{{ $users->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Электронная почта" value="{{ $users->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Age</label>
            <input type="text" name="age" class="form-control" placeholder="Возраст" value="{{ $users->Age }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Дата создания</label>
            <input type="text" name="created_at" class="form-control" placeholder="Дата создания" value="{{ $users->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Дата обновление</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Дата обновление" value="{{ $users->updated_at }}" readonly>
        </div>
    </div>
@endsection
