<?php

namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper {
    public static function generateToken(array $payload, int $expiry = 60): string {
        $key = config('app.key');
        $payload['exp'] = time() + $expiry * 60; // Minutes to seconds

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function validateToken(string $token): ?object {
        try {
            $key = config('app.key');
            return JWT::decode($token, new Key($key, 'HS256'));
        } catch (\Exception $e) {
            return null;
        }
    }
}
