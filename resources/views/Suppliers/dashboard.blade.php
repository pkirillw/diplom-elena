@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Поставщики</h1>
        <a class="btn btn-primary pull-right" href="/supplier/add" style="color: #fff">Добавить поставщика</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Адрес</th>
                <th>ИНН</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['address']}}</td>
                    <td>{{$item['inn']}}</td>
                    <td><a href="/supplier/delete/{{$item['id']}}">Удалить</a> / <a href="/supplier/edit/{{$item['id']}}">Редактировать</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>

