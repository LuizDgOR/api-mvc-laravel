<?php

namespace App\DTO;

use App\Http\Requests\LoginUserRequest;

class LoginUserDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ){}

    public static function fromLogin(LoginUserRequest $request):self
    {   
        return new self(
            $request->email,
            $request->password,
        );
    }
}