<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\VisitController;

class problem_detected extends Model
{
    use HasFactory;
    protected $table = 'problem_detected';
    protected $primarykey = 'id';
    public $timestamps = 'false';

    public function visit()
    {
        return $this->belongsTo(visit::class);
    }
    public function treatment()
    {
        return $this->hasOne(treatment::class);
    }
}
