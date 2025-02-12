<?php 

namespace App\Interfaces;

use App\DTO\CreateUserDTO;
use App\Models\User;

interface AuthRepositoryInterface
{   
    public function __construct(User $modeluser);
    public function register(CreateUserDTO $dto);
    public function login(string $email);

}