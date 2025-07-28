<?php

namespace App\DTO;

class CourseDto
{
    public string $course_name;
    public string $description;
    public float $rating;
    public string $status;
    public bool $is_paid;
    public string $start_date;
    public string $end_date;
    public int $category_id;

    public static function fromArray(array $data): self
    {
        $dto = new self();
        $dto->course_name = $data['course_name'];
        $dto->description = $data['description'];
        $dto->rating = $data['rating'];
        $dto->status = $data['status'];
        $dto->is_paid = $data['is_paid'];
        $dto->start_date = $data['start_date'];
        $dto->end_date = $data['end_date'];
        $dto->category_id = $data['category_id'];
        return $dto;
    }
    public function toArray(): array
    {
        return [
            'course_name' => $this->course_name,
            'description' => $this->description,
            'rating' => $this->rating,
            'status' => $this->status,
            'is_paid' => $this->is_paid,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'category_id' => $this->category_id,
        ];
    }

}
