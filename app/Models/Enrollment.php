<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollments';

    /**
     * @property unsignedBigInteger $student_id
     * @property unsignedBigInteger $subject_id
     * @property date $start_date
     * @property date $end_date
     * @property boolean $status           0=>Inactive, 1=>Active
     */

    protected $fillable = [
        'student_id',
        'subject_id',
        'start_date',
        'end_date',
        'status'
    ];

    public function student ()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject ()
    {
        return $this->belongsTo(Subject::class);
    }
    
}
