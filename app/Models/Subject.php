<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    /**
     * @property string $code
     * @property string $name
     * @property boolean $status      0=>Inactive, 1=>Active
     * @property date $start_date
     * @property date $end_date
     */

     protected $fillable = [
        'code',
        'name',
        'status',
        'start_date',
        'end_date',
     ];
    
}
