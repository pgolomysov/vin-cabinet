<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = "report";

    protected $fillable = ['request_id', 'status', 'data', 'source'];

    public function request()
    {
        return $this->hasOne(Request::class);
    }
}
