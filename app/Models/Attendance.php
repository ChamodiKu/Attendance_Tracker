<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    /**
     * @property unsignedBigInteger $student_id
     * @property unsignedBigInteger $subject_id
     * @property date $date
     * @property boolean $status        0=>Absent, 1=>Present
     */

    protected $fillable = [
        'student_id',
        'subject_id',
        'date',
        'status',
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
