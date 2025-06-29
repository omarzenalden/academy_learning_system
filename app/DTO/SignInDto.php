<?php

namespace App\DTO;

class SignInDto
{
    public function __construct(
        public readonly string $login,
        public readonly ?string $password,
        public readonly ?string $social_id,
        public readonly ?string $social_type
    )
    {}

    public static function fromArray(array $data){
        return new self(
            login: $data['login'],
            password: $data['password'] ?? null,
            social_id: $data['social_id'] ?? null,
            social_type: $data['social_type'] ?? null
        );
    }
}
