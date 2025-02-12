<?php

namespace App\Repositories;

use App\DTO\CreateUserDTO;
use App\Http\Requests\StoreUserRequest;
use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Hash;
use Illuminate\Http\Response;
use stdClass;

class AuthRepository implements AuthRepositoryInterface
{   
    public function __construct(
        protected User $modelUser,
    ){}

    public function register(CreateUserDTO $dto):User
    {
        $dto->password = Hash::make($dto->password);
        $user = $this->modelUser->create((array)$dto);
        return $user;
    }

    public function login($email)
    {
        if(!$user = $this->modelUser->find($email)){
            return response()->json([
                'error'=>'Not Found',
            ], Response::HTTP_NOT_FOUND);
        }
        return $user;
    }
}