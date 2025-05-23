<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;

    protected $table = 'students';

    /**
     * @property string $registration_no
     * @property string $first_name
     * @property string $last_name
     * @property string $email
     * @property string $phone
     * @property string $address
     * @property string $date_of_birth
     * @property string $gender
     * @property string $status
     */

    protected $fillable = [
        'registration_no',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'date_of_birth',
        'gender',
        'status',
    ];

    public function enrollements ()
    {
        return $this->hasMany(Enrollment::class,'student_id', 'id');
    }

    public function attendances ()
    {
        return $this->hasMany(Attendance::class,'student_id', 'id');
    }

}
