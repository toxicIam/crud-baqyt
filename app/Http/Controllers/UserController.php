<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
//индекс
    public function index()
    {
       $users = Users::orderBy('created_at', 'DESC')->get();

       return view('users.index', compact('users'));
    }

// cjplfybt
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $rules = [
            'name' => 'required|string',
            'email' => 'required|email|regex:/@/', // Должен содержать символ @
            'age' => 'nullable|integer|min:0', // Установливаем нижний парок
        ];

        // Сообщение
        $messages = [
            'email.email' => 'Пожалуйста введите корректную электронную почту.',
            'email.regex' => 'Некорректная электронная почта.',
            'age.integer' => 'Введение коректные данные.',
            'age.min' => 'Возраст не должен быть отрицательным.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);

        // Проверка, если валидация провалена
        if ($validator->fails()) {
            return redirect()->route('users.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Валидация, создание ползователя
        Users::create($request->all());

        return redirect()->route('users.index')->with('success', 'Пользователь добавлен');

        // Users::create($request->all());

        // return redirect()->route('users.index')->with('success', 'users added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Users::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Users::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Users::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Данные успешно обновлены');
    }

    public function destroy(string $id)
    {
        $user = Users::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Пользователь успешно удалено'); // Corrected success message.
    }
}
