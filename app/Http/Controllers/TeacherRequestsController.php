<?php

namespace App\Http\Controllers;

use App\DTO\ApproveDto;
use App\Http\Requests\ApproveTeacherRequest;
use App\ResponseTrait;
use App\Services\TeacherRequestsService;
use Illuminate\Http\Request;

class TeacherRequestsController extends Controller
{
    use ResponseTrait;
    public $teacherRequestsService;
    public function __construct(TeacherRequestsService $teacherRequestsService)
    {
        $this->teacherRequestsService = $teacherRequestsService;
    }

    public function show_all_teacher_requests()
    {
        $data = $this->teacherRequestsService->show_all_teacher_requests();
        return $this->Success($data['data'],$data['message']);
    }

    public function approve_teacher_request(ApproveTeacherRequest $request, $teacher_id)
    {
        $approve_dto = ApproveDto::fromArray($request->validated());
        $data = $this->teacherRequestsService->approve_teacher_request($approve_dto,$teacher_id);
        return $this->Success($data['data'],$data['message']);
    }
}
