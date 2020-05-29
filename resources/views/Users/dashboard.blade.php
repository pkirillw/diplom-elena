@extends('Layouts.app')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Люди</h1>
        <a class="btn btn-primary pull-right" href="/users/add" style="color: #fff">Добавить человека</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>ФИО</th>
                <th>Эл. Почта</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['fname']}} {{$item['lname']}}</td>
                    <td>{{$item['email']}}</td>
                    <td><a href="/users/delete/{{$item['id']}}">Удалить</a> / <a
                                href="/users/edit/{{$item['id']}}">Редактировать</a> / <a href="/users/equipment/{{$item['id']}}">Просмотр закрепленной техники</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
