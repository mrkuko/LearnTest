<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model{
//    public static function all(): array {
////        return [
////            [
////                'id' => 1,
////                'title' => 'Web Developer',
////                'salary' => '$20000'
////            ]
////        ];
//    }
//
//    public static function find(int $id): array {
//        $job = Arr::first(static::all(), fn ($item) => $item['id'] == $id);
//
//        if (!$job) {
//            abort(404, 'Job not found');
//        }
//        return $job;
//    }
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary', 'employer_id'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
