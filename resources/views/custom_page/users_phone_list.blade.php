@extends('main_page')

@section('phone_list')

    <div class="container">

        <div id="addUserPhone">
            <p align="center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPhone">Добавить телефон (не более 10 номеров)</button></p>
        </div>

        <div class="modal fade" id="createPhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить номер телефона</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/add_phone/{{$user_id}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="number" class="col-form-label">Номер телефона в формате +380-xx-ххх-хх-хх:</label>
                                <input type="tel" class="form-control" id="number" name="number" pattern="\+380-([0-9]{2})-([0-9]{3})-([0-9]{2})-([0-9]{2})" required>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-form-label">Краткое описание:</label>
                                <input type="text" class="form-control" id="desc" name="desc" required>
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

        @if($phones->isEmpty())
            <h4 align="center">Список номеров пользователя пока пуст</h4>
        @else
            <ul class="list-group">
                @foreach($phones as $phone)
                    <li class="list-group-item "><b>{{$phone->number}}</b> ------- {{$phone->description}} --------
                        <a href="/phone_delete/{{$phone->id}}" class="float-right" style="margin-right: 10px"><i class="far fa-trash-alt"> </i></a>
                        <a href="/phone_edit_page/{{$phone->id}}" class="float-right"><i class="fas fa-edit" style="margin-right: 10px"> </i></a>
                    </li>

                @endforeach
            </ul>
        @endif

        @if (session('message'))
            <div class="alert alert-success" style="margin-top: 20%">
                {{ session('message') }}
            </div>
        @endif

        @if (session('message_err'))
            <div class="alert alert-warning" style="margin-top: 20%">
                {{ session('message_err') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    @endsection