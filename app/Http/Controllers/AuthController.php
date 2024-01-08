<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @OA\Post(
     *       path="/login",
     *       operationId="loginUser",
     *       tags={"ЛК"},
     *       summary="Логин пользователя",
     *       description="Логин пользователя в системе.",
     *       @OA\RequestBody(
     *           required=true,
     *           description="Данные для регистрации пользователя",
     *           @OA\JsonContent(
     *               required={"login", "password"},
     *               @OA\Property(property="login", type="string", example="ivan@example.com или +79998887766"),
     *               @OA\Property(property="password", type="string", format="password", example="ABCabc$123"),
     *           ),
     *       ),
     *       @OA\Response(
     *           response=200,
     *           description="Пользователь успешно авторизован",
     *               @OA\JsonContent(
     *                type="object",
     *                @OA\Property(property="token", type="string", example="Bearer token"),
     *            ),
     *       ),
     *  @OA\Response(
     *           response=422,
     *           description="Ошибка валидации",
     *           @OA\JsonContent(
     *               type="object",
     *               @OA\Property(property="message", type="string", example="Предоставленные данные неверны."),
     *               @OA\Property(property="errors", type="object"),
     *           ),
     *       ),
     *   )
     */
    public function login(Request $request)
    {
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
