<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
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
}
