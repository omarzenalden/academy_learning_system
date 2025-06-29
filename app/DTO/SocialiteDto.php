<?php

namespace App\DTO;

class SocialiteDto
{
    public string $username;
    public string $email;
    public string $social_id;
    public string $social_type;
    public string $user_type;
    public function __construct($googleUser, $user_type){
        $this->username = $googleUser->name;
        $this->email = $googleUser->email;
        $this->social_id = $googleUser->id;
        $this->social_type = 'google';
        $this->user_type = $user_type;
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
            'social_id' => $this->social_id,
            'social_type' => $this->social_type,
            'user_type' => $this->user_type,
        ];
    }
}
