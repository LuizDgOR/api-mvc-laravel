<?php

namespace App\DTO;

use App\Http\Requests\StoreUserRequest;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ){}

    public static function makeFromRequest(StoreUserRequest $request):self
    {
        return new self(
            $request->name,
            $request->email,
            $request->password,
        );
    }
}