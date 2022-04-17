<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'request';

    protected $fillable = ['vin', 'car_number', 'user_id'];

    public function reports()
    {
        $this->hasMany(Report::class);
    }
}
