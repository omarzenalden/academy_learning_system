<?php

namespace App\DTO;

class SignUpDto
{
    public function __construct(
        public readonly string $username,
        public readonly string $email,
        public readonly string $password,
        public readonly ?string $social_id = null,
        public readonly ?string $social_type = null,
        public readonly ?string $user_type = null,
        public bool $is_approved = false,
        public readonly array $file_path = [],
        public readonly ?string $description = null,
        public readonly ?string $family_email = null
    )
    {}



    public static function fromArray(array $data){
        return new self(
            username: $data['username'],
            email: $data['email'],
            password: $data['password'],
            social_id: $data['social_id'] ?? null,
            social_type: $data['social_type'] ?? null,
            user_type: $data['user_type'],
            is_approved: $data['is_approved'] ?? false,
            file_path: $data['file_path'] ?? [],
            description: $data['description'] ?? null,
            family_email: $data['family_email'] ?? null
        );
    }
}
