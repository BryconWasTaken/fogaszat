<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\VisitController;

class patient extends Model
{
    use HasFactory;
    protected $table = 'patient';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function visit()
    {
        return $this->hasMany(visit::class);
    }

    protected $fillable = ['firstname', 'surname', 'taj', 'birthdate',];
}

