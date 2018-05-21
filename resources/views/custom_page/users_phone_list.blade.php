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
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="p_number" class="col-form-label">Номер телефона в формате +380-xx-ххх-хх-хх:</label>
                                <input type="tel" class="form-control" id="p_number" name="p_number" pattern="\+380-([0-9]{2})-([0-9]{3})-([0-9]{2})-([0-9]{2})" required>
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

    </div>

    @endsection