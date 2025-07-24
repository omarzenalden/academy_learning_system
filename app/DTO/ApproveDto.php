<?php

namespace App\DTO;

class ApproveDto
{
    public function __construct(
     public readonly string $is_approved
    )
    {}

    public static function fromArray(array $data)
    {
        return new self(
            is_approved: $data['is_approved']
        );
    }
}
