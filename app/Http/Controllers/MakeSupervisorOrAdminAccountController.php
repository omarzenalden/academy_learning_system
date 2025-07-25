<?php

namespace App\Http\Controllers;

use App\DTO\SignUpDto;
use App\Http\Requests\CreateSupervisorOrAdminAccountRequest;
use App\Http\Requests\signUpRequest;
use App\ResponseTrait;
use App\Services\CreateSupervisorOrAdminAccountService;
use Illuminate\Http\Request;

class MakeSupervisorOrAdminAccountController extends Controller
{
    use ResponseTrait;
    protected $createSupervisorAccountService;
    public function __construct(CreateSupervisorOrAdminAccountService $createSupervisorAccountService)
    {
        $this->createSupervisorAccountService = $createSupervisorAccountService;
    }
    public function create_supervisor_admin_account(CreateSupervisorOrAdminAccountRequest $request)
    {
        $data = $request->validated();
        $signUpDto = SignUpDto::fromArray($data);
        $data = $this->createSupervisorAccountService->create_supervisor_admin_account($signUpDto);
        return $this->Success($data['data'],$data['message']);
    }
}
