<?php

namespace App\Http\Controllers\Api\Auth;

use App\DTO\CreateUserDTO;
use App\DTO\LoginUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\LoginUserResource;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthApiController extends Controller
{
    public function __construct(
        protected UserService $userService,
    ){}

    public function register(StoreUserRequest $request)
    {
        $result = $this->userService->register(
            CreateUserDTO::makeFromRequest($request)
        );
        return new UserResource($result);
    }

    public function login(LoginUserRequest $request)
    {
        $result = $this->userService->login(
            LoginUserDTO::fromLogin($request)
        );
        return new LoginUserResource($result->user, $result->token);
    }
}
