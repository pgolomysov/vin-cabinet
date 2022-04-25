<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'request';

    protected $fillable = ['vin', 'car_number', 'user_id'];

    public static function createWithDefaultUser(array $attributes)
    {
        $attributes = array_merge(['user_id' => 1], $attributes);

        return self::create($attributes);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
