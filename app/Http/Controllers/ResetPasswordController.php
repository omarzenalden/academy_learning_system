<?php

namespace App\Http\Controllers;

use App\DTO\ResetPasswordCheckCodeDto;
use App\DTO\ResetPasswordCheckEmailDto;
use App\Http\Requests\ResetPassword\ResetPasswordRequest;
use App\Http\Requests\ResetPassword\ResetTokenRequest;
use App\Http\Requests\ResetPasswordCheckCodeRequest;
use App\Http\Requests\ResetPasswordCheckEmailRequest;
use App\ResponseTrait;
use App\Services\ResetPasswordService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    use ResponseTrait;
    public $resetPasswordService;
    public function __construct(ResetPasswordService $resetPasswordService)
    {
        $this->resetPasswordService = $resetPasswordService;
    }

    public function send_reset_password_code(ResetPasswordCheckEmailRequest $request)
    {
        $checkEmailDto = ResetPasswordCheckEmailDto::fromArray($request->validated());
        $data = $this->resetPasswordService->send_reset_password_code($checkEmailDto);
        return $this->Success($data['data'],$data['message']);
    }

    public function check_reset_code(ResetPasswordCheckCodeRequest $request)
    {
        $checkCodeDto = ResetPasswordCheckCodeDto::fromArray($request->validated());
        $data = $this->resetPasswordService->check_reset_code($checkCodeDto);
        return $this->Success($data['data'],$data['message']);
    }

    public function resend_reset_code(ResetTokenRequest $request)
    {
        $validated = $request->validated();
        $data = $this->resetPasswordService->resend_reset_code($validated['reset_token']);
        return $this->Success($data['data'], $data['message']);
    }

    public function set_new_password(ResetTokenRequest $tokenRequest,ResetPasswordRequest $passwordRequest)
    {
        $token_validated = $tokenRequest->validated();
        $password_validated = $passwordRequest->validated();
        $data = $this->resetPasswordService->set_new_password($token_validated['reset_token'], $password_validated['password']);
        return $this->Success($data['data'],$data['message']);
    }
}
