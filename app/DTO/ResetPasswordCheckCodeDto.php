<?php

namespace App\DTO;

class ResetPasswordCheckCodeDto
{
    public function __construct(
        public readonly string $reset_token,
        public readonly int $code
    )
    {}

    public static function fromArray(array $data): ResetPasswordCheckCodeDto
    {
        return new self(
            reset_token: $data['reset_token'],
            code: $data['code']
        );
    }
}
