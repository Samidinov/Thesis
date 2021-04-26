<?php


namespace App\Http\Service;


use App\Models\User;

class SavedListService
{
    private function getUser ($user_id) {
        return User::find($user_id);
    }
    public function getAllSavedListByUserId ($user_id) {
        return $this->getUser($user_id)->ads;
    }
}
