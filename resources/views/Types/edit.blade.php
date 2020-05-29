@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Типы оборудования</h1>
        <a class="btn btn-primary pull-right" href="/types/add" style="color: #fff">Добавить тип оборудования</a>
    </div>
    <form method="post" action="/types/editType">
        {{ csrf_field() }}
        <input type="hidden" name="type_id" value="{{$data['id']}}">
        <div class="form-group">
            <label for="exampleFormControlInput1">Наименование</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="Видеокарты" value="{{$data['name']}}">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</main>