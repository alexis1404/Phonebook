<?php

namespace App\Repositories;

use App\Phone;

class PhoneRepository
{
    private $userRepo;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function createPhone($number, $user_id)
    {
        $user = $this->userRepo->getUserForId($user_id);

        $phone = new Phone();

        $phone->number = $number;

        return $user->addNumber($phone);
    }

    public function getPhoneForId($id)
    {
        return Phone::findOrFail($id);
    }
}