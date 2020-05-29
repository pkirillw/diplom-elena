@extends('Layouts.app')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Техника в ремонт</h1>
    </div>
    <div class="col-lg-12">
        <table class="table table-bordered">
            <tr>
                <td>Инв. номер</td>
                <td>ФИО сотрудника</td>
                <td>Наименование техники</td>
                <td>Тип техники</td>
            </tr>
            <tr>
                <td>{{$data['inventory']['id']}}</td>
                <td>{{$data['userdata']['fname']}} {{$data['userdata']['lname']}}</td>
                <td>{{$data['equipment']['name']}}</td>
                <td>{{$data['type']['name']}}</td>
            </tr>
        </table>
    </div>
    <form method="post" action="/repair/addRepair">
        {{ csrf_field() }}
        <input type="hidden" name="inventory_id" value="{{$data['inventory']['id']}}">
        <div class="form-group">
            <label for="exampleFormControlInput1">Причина</label>
            <textarea name="reason" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</main>
