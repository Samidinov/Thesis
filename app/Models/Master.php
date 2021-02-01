<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_master', 'master_id', 'category_id');
    }
    /**
     * getters
     */

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function getBirthYear()
    {
        return $this->birth_year;
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * setters
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    public function setBirthYear($birthYear)
    {
        $this->birth_year = $birthYear;
    }
    public function setId($user_id)
    {
        $this->id = $user_id;
    }
}
