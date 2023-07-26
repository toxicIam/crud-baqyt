@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add Book</h1>
    <hr />
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="ФИО">
            </div>
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="Электронная почта">
                @error('email') <!-- Use the field name 'email' to display the error message for the 'email' field -->
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <input type="text" name="age" class="form-control" placeholder="Возраст">
                @error('age') <!-- Use the field name 'age' to display the error message for the 'age' field -->
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- <div class="row mb-3">

        </div> -->
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Добавить</button>
            </div>
        </div>
    </form>
@endsection
