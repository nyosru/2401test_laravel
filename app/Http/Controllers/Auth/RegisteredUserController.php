<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisteredUserController extends Controller
{


    /**
     * @OA\Post(
     *      path="/register",
     *      operationId="registerUser",
     *      tags={"ЛК"},
     *      summary="Регистрация нового пользователя",
     *      description="Регистрация нового пользователя в системе.",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Данные для регистрации пользователя",
     *          @OA\JsonContent(
     *              required={"name", "email", "phone", "password"},
     *              @OA\Property(property="name", type="string", example="Иван Иванов"),
     *              @OA\Property(property="email", type="string", format="email", example="ivan@example.com"),
     *              @OA\Property(property="phone", type="string", format="tel", example="+79998887766"),
     *              @OA\Property(property="password", type="string", format="password", example="ABCabc$123"),
     *              @OA\Property(property="password_confirmation", type="string", format="password", example="ABCabc$123"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Пользователь успешно зарегистрирован",
     *              @OA\JsonContent(
     *               type="object",
     *               @OA\Property(property="user", type="object", example="user data"),
     *               @OA\Property(property="token", type="string", example="Bearer token"),
     *           ),
     *      ),
     * @OA\Response(
     *          response=422,
     *          description="Ошибка валидации",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Предоставленные данные неверны."),
     *              @OA\Property(property="errors", type="object"),
     *          ),
     *      ),
     *  )
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'regex:/^\+7\d{10}$/', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[$%&!:.])/'
//                , Rules\Password::defaults()
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('MyApp')->accessToken;

        //        dd($token);

        event(new Registered($user));

        Auth::login($user);

        // Генерация токена (при использовании пакета Passport)

        // Возвращение успешного ответа с токеном
//        return $token;
        return response()->json([ 'user'=> $user, 'token' => $token], 201);
//        return response()->noContent(204);
    }
}
