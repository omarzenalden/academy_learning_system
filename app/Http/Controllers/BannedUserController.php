<?php

namespace App\Http\Controllers;

use App\DTO\BannedUserDto;
use App\Http\Requests\BannedUserRequest;
use App\ResponseTrait;
use App\Services\BannedUserService;
use Illuminate\Http\Request;

class BannedUserController extends Controller
{
    use ResponseTrait;
    protected $bannedUserService;
    public function __construct(BannedUserService $bannedUserService)
    {
        $this->bannedUserService = $bannedUserService;
    }

    public function ban_user(BannedUserRequest $request)
    {
        $bannedUserDto = BannedUserDto::fromArray($request->validated());
        $data = $this->bannedUserService->ban_user($bannedUserDto);
        return $this->Success($data['data'],$data['message']);
    }

    public function all_banned_users()
    {
        $data = $this->bannedUserService->show_all_banned_users();
        return $this->Success($data['data'],$data['message']);
    }
    public function temporary_banned_users()
    {
        $data = $this->bannedUserService->show_all_temporary_banned_users();
        return $this->Success($data['data'],$data['message']);
    }
    public function permanent_banned_users()
    {
        $data = $this->bannedUserService->show_all_permanent_banned_users();
        return $this->Success($data['data'],$data['message']);
    }
}
