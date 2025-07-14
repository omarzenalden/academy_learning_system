<?php

namespace App\DTO;

class ResetPasswordCheckEmailDto
{
    public function __construct(public readonly string $email)
    {}

    public static function fromArray(array $data): ResetPasswordCheckEmailDto
    {
        return new self(
            email: $data['email']
        );
    }
}
