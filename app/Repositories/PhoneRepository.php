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

    public function createPhone($number, $desc ,$user_id)
    {
        $user = $this->userRepo->getUserForId($user_id);

        $phone = new Phone();

        $phone->number = $number;
        $phone->description = $desc;

        return $user->addNumber($phone);
    }

    public function getPhoneForId($id)
    {
        return Phone::findOrFail($id);
    }

    public function deletePhone($phone_id)
    {
        $phone = $this->getPhoneForId($phone_id);

        $phone->deletePhone();
    }

    public function editPhone($phone_id, $number, $description)
    {
        $phone = $this->getPhoneForId($phone_id);

        $phone->editNumber($number, $description);
    }
}