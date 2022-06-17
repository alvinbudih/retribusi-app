<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUji extends Model
{
    use HasFactory;

    protected $table = "status_uji";
    protected $guarded = ["id"];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
