<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function works()
    {
       return $this->belongsToMany(Work::class,'service_work' ,'service_id', 'work_id');
    }
    public function masters()
    {
        return $this->belongsToMany(Master::class,'category_master' ,'category_id', 'master_id');
    }
}
