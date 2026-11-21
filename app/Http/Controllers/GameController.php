<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    // Получение всех игр
    public function index() {
        $games = Game::all();
        return response()->json([
            'status' => 'success',
            'data' => $games
        ],200);
    }

    // Получение одной игры по ID
    // Добавляем передаваемое значение ID
    public function show($id) {
        // Ищем игру по её идентификатору
        $game = Game::find($id);

        // Если игры не найдена - ответ в формате JSON - игра не найдена
        if (!$game) {
            return response()->json([
                'status' => 'Not found',
                'message' => 'Game not found'
            ], 404);
        }
        // Если игра найдена - выводим её, с дополнительным сообщением status - success
        return response()->json([
            'status' => 'success',
            'data' => $game
        ],200);
    }
    // Создание новой игры
    public function store(Request $request) {
        // Валидация входящих данных
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'gamepad' => 'boolean',
        ]);
        // Создаем игру - и валидируем ее
        $game = Game::create($validated);
        return response()->json([
            'status' => 'success',
            'message' => 'Game created successfully',
            'data' => $game
        ],201); // 201 - Created
    }
    public function update(Request $request, $id) {
        $game = Game::find($id);
        if (!$game) {
            return response()->json([
                'status' => 'Not found',
                'message' => 'Game not found'
            ],404);
        }
        // Валидация (правило 'sometimes' означает, что поле не обязательно, но если оно пришло, то его необходимо проверить)
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string|max:255',
            'gamepad'=>'boolean',
        ]);

        $game->update($validated);
        return response()->json([
            'status' => 'success',
            'message' => 'Game updated successfully',
            'data' => $game
        ], 200);
    }
    public function destroy($id) {
        $game = Game::find($id);

        if (!$game) {
            return response()->json([
                'status' => 'Not found',
                'message' => 'Game not found'
            ],404);
        }
        $game->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Game deleted successfully'
        ],200);
    }
}
