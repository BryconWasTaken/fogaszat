<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\VisitController;

class treatment extends Model
{
    use HasFactory;
    protected $table = 'treatment';
    protected $primarykey = 'id';
    public $timestamps = false;

    public function visit()
    {
        return $this->hasMany(visit::class);
    }

    protected $fillable=['treatment_name', 'treatment_length', 'price'];
}
