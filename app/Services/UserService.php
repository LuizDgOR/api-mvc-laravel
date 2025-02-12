<?php

namespace App\Services;

use App\DTO\CreateUserDTO;
use App\DTO\LoginUserDTO;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\AuthRepository;
use Auth;
use stdClass;

class UserService 
{
    public function __construct(
        protected AuthRepository $authRepository,
    ){}

    public function register(CreateUserDTO $dto)
    {   

        $user = $this->authRepository->register($dto);
        return $user;
    }

    public function login(LoginUserDTO $dto)
    {   

        $user = $this->authRepository->login($dto->email);
        $token = $user->createToken('auth_token')->plainTextToken;
        return (object)[
            'user' => $user,
            'token' => $token,
        ];
    }
}