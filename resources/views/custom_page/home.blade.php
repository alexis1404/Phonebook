@extends('main_page')

@section('content')

<div id="addUserButton">
    <p align="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">Добавить пользователя</button></p>
</div>
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить пользователя</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user_create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="last_name" class="col-form-label">Фамилия:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Имя:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="pat" class="col-form-label">Отчество:</label>
                            <input type="text" class="form-control" id="pat" name="pat" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        @if($users->isEmpty())
            <h4 align="center">Телефонная книга пуста. Добавьте пользователя чтобы начать!</h4>
            @else

            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item ">{{$user->last_name}} {{$user->name}} {{$user->pat}}
                        <a href="/user_phones/{{$user->id}}" class="float-right" style="margin-right: 10px"><i class="fas fa-phone" data-toggle="tooltip" data-placement="top" title="Телефоны пользователя"> </i></a>
                        <a href="/user_edit_page/{{$user->id}}" class="float-right"><i class="fas fa-edit" style="margin-right: 10px" data-toggle="tooltip" data-placement="top" title="Редактировать данные пользователя"> </i></a>
                        <a href="/user_delete/{{$user->id}}" class="float-right" style="margin-right: 10px"><i class="far fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Удалить пользователя"> </i></a>
                    </li>
                    @endforeach
            </ul>

        @endif

            @if (session('message'))
                <div class="alert alert-success" style="margin-top: 20%">
                    {{ session('message') }}
                </div>
                @endif

    </div>

    @yield('user_edit_form')

    @endsection
