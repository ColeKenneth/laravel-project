<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Override;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_number',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'position',
        'hired_at'
    ];

    #[Override]
    protected function casts() : array
    {
        return [
            'hired_at' => 'date'
        ];
    }
}
