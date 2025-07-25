<?php

namespace App\Services;


use App\DTO\ApproveDto;
use App\Models\AcademicCertificate;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class TeacherRequestsService
{
    public function show_all_teacher_requests(): array
    {
        try {
            // Check if the current user is admin
            if (!Auth::user()->hasRole('admin')) {
                return [
                    'data' => null,
                    'message' => 'You do not have permissions to access'
                ];
            }

            // Get all unapproved teachers with their academic certificates
            $teachers = User::query()
                ->where('is_approved', '=', 0)
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'teacher');
                })
                ->with('academic_certificates')
                ->get();

            Log::info('Admin viewed teacher requests', ['admin_id' => Auth::id()]);

            return [
                'data' => $teachers,
                'message' => $teachers->isEmpty()
                    ? 'There are no requests right now.'
                    : 'Returned all requests successfully.'
            ];
        } catch (Exception $e) {
            Log::error('Failed to fetch teacher requests', [
                'admin_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return [
                'data' => null,
                'message' => 'Something went wrong. Please try again later.'
            ];
        }
    }

    public function approve_teacher_request(ApproveDto $approveDto, $teacher_id): array
    {
        if (!Auth::user()->hasRole('admin')) {
            return [
                'data' => null,
                'message' => 'You do not have permissions to access.'
            ];
        }
        DB::beginTransaction();

        try {
                $teacher = User::query()
                    ->where('id', $teacher_id)
                    ->where('is_approved', '=', 0)
                    ->whereHas('roles', function ($query) {
                        $query->where('name', 'teacher');
                    })
                    ->first();

                if (!$teacher) {
                    Log::warning('Attempted to approve/reject nonexistent or already-approved teacher', [
                        'teacher_id' => $teacher_id,
                        'admin_id' => Auth::id()
                    ]);
                    return [
                        'data' => null,
                        'message' => 'Teacher not found or already handled.'
                    ];
                }

                if ($approveDto->is_approved === 'yes') {
                    $teacher->update(['is_approved' => 1]);

                    DB::commit();
                    Log::info('Teacher approved successfully', [
                        'teacher_id' => $teacher_id,
                        'admin_id' => Auth::id()
                    ]);

                    return [
                        'data' => $teacher,
                        'message' => 'Teacher approved successfully.'
                    ];
                } else {
                    // Delete academic certificates records
                    AcademicCertificate::query()->where('teacher_id', $teacher_id)->delete();

                    // delete the user record
                    $teacher->delete();

                    DB::commit();

                    Log::info('Teacher rejected and deleted successfully', [
                        'teacher_id' => $teacher_id,
                        'admin_id' => Auth::id()
                    ]);

                    return [
                        'data' => null,
                        'message' => 'Teacher rejected and deleted successfully.'
                    ];
                }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to approve/reject teacher', [
                'teacher_id' => $teacher_id,
                'admin_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return [
                'data' => null,
                'message' => 'There was a problem processing the request.'
            ];
        }
    }
}
