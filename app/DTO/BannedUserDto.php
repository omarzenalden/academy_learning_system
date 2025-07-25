<?php

namespace App\DTO;

use Carbon\Carbon;

class BannedUserDto
{
    public function __construct(
        public readonly int $user_id,
        public readonly string $reason,
        public readonly ?Carbon $expires_at
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            user_id: $data['user_id'],
            reason: $data['reason'],
            expires_at: isset($data['expires_at']) ? Carbon::parse($data['expires_at']) : null
        );
    }
}
