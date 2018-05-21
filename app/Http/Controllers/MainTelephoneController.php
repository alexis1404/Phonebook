<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\PhoneRepository;

class MainTelephoneController extends Controller
{
    private $userRepo;
    private $phone_repo;

    public function __construct(UserRepository $userRepository, PhoneRepository $phoneRepository)
    {
        $this->userRepo = $userRepository;
        $this->phone_repo = $phoneRepository;
    }

    public function index()
    {
        return view('custom_page.home', ['users' => $this->userRepo->getAllUsers()]);
    }

    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:70',
            'last_name' => 'required|max:70',
            'pat' => 'required|max:70'
        ]);

        $this->userRepo->createUser($request->name, $request->last_name, $request->pat);

        return redirect()->back()->with('message', 'Пользователь успешно создан');
    }

    public function user_delete($user_id)
    {
        $this->userRepo->deleteUser($user_id);

        return redirect()->back()->with('message', 'Пользователь успешно удален');
    }

    public function userEditPage($id_user)
    {
        return view('custom_page.user_edit_form', ['id_user' => $id_user]);
    }

    public function editUser(Request $request, $user_id)
    {
        $this->userRepo->editUser($user_id, $request->name, $request->last_name, $request->pat);

        return redirect('/')->with('message', 'Данные пользователя успешно изменены');

    }

    public function userPhones($user_id)
    {
        return view('custom_page.users_phone_list', ['phones' => $this->userRepo->getUserPhonesForId($user_id), 'user_id' => $user_id]);
    }

    public function addPhone(Request $request, $user_id)
    {
        $result = $this->phone_repo->createPhone($request->p_number, $user_id);

        if($result){
            return redirect()->back()->with('message', 'Номер успешно сохранен');
        }

        return redirect()->back()->with('message_err', 'Ошибка! В телефонной книге пользователя не может быть более 10 номеров!');
    }
}
