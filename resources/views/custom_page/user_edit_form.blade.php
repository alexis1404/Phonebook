@extends('main_page')

@section('user_edit_form')

    <div class="container">
        <h3>Изменить данные пользователя</h3>

        <form action="/user_edit/{{$id_user}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name" class="col-form-label">Имя:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="last_name" class="col-form-label">Фамилия:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="pat" class="col-form-label">Отчество:</label>
                <input type="text" class="form-control" id="pat" name="pat">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>

    </div>

    @endsection