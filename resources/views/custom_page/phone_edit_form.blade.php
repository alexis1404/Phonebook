@extends('main_page')

@section('phone_edit_form')

    <div class="container">
        <h3>Изменить номер телефона</h3>

        <form action="/phone_edit/{{$phone->id}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="number" class="col-form-label">Номер телефона в формате 380xx-xxx-xxxx:</label>
                <input type="tel" class="form-control" id="number" name="number" placeholder="{{$phone->number}}">
            </div>
            <div class="form-group">
                <label for="desc" class="col-form-label">Краткое описание:</label>
                <input type="text" class="form-control" id="desc" name="desc" placeholder="{{$phone->description}}">
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>

    </div>

    <script>
        $.jMaskGlobals = {translation: {
                'n': {pattern: /\d/},
            }
        };
        $('#number').mask('+380nn-nnn-nnnn').val('+380');
    </script>

    @endsection