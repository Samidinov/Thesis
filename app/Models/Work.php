<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Sodium\add;

class Work extends Model
{
    use HasFactory;

    public function categories ()
    {
        return $this->belongsToMany(Category::class, 'service_work', 'work_id', 'service_id');
    }

    public function users ()
    {
        return $this->belongsToMany('App\Models\User', 'service_work');
    }
     public function adsUser ()
    {
        return $this->belongsToMany('App\Models\User', 'ad_user', 'ad_id', 'user_id')
            ->withPivot(['category']);
    }

    /**
     *  GETTERS
     */
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getTimeToWork()
    {
        return $this->time_to_work;
    }

    public function getExpDate()
    {
        return $this->exp_date;
    }

    /**
     * SETTERS
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    public function setTimeToWork($time_to_work)
    {
        $this->time_to_work = $time_to_work;
    }

    public function setExpDate($exp_date)
    {
        $this->exp_date = $exp_date;
    }
}
