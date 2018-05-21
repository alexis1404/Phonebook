<?php

namespace App\Repositories;

use App\User;
use Faker;

class UserRepository
{
    public function createUser($name, $last_name, $pat)
    {
        $user =  new User();
        $faker = Faker\Factory::create();

        $user->name = $name;
        $user->last_name = $last_name;
        $user->pat = $pat;
        $user->email = $faker->email;
        $user->password = bcrypt('qwerty');

        $user->save();

        return $user;
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserForId($id)
    {
        return User::findOrFail($id);
    }

    public function deleteUser($user_id)
    {
        $user = $this->getUserForId($user_id);

        $user->deleteUser();
    }

    public function editUser($user_id, $name = false, $last_name = false, $pat = false)
    {
        $user = $this->getUserForId($user_id);

        $user->editUser($name, $last_name, $pat);
    }

    public function getUserPhonesForId($user_id)
    {
        $user = $this->getUserForId($user_id);

        return $user->phones;
    }

}