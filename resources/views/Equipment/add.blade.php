@extends('Layouts.app')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление техники</h1>
    </div>
    <form method="post" action="/equipment/addEquipment">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1">Тип</label>
            <select class="form-control" name="type">
                @foreach($data['types'] as $type)
                    <option value="{{$type['id']}}">{{$type['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Поставщик</label>
            <select class="form-control" name="supplier">
                @foreach($data['suppliers'] as $supplier)
                    <option value="{{$supplier['id']}}">{{$supplier['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Наименование</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Гарантия</label>
            <input type="text" name="warranty" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Стоймость</label>
            <input type="text" name="cost" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Количество</label>
            <input type="text" name="count" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</main>
