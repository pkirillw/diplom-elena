@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Инвентарь</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Ответственный человек</th>
                <th>Тип оборудования</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item['inventoryData']['inventory']['id']}}</td>
                    <td>{{$item['inventoryData']['inventory']['name']}}</td>
                    <td>{{$item['userData']['fname']}} {{$item['userData']['mname']}} {{$item['userData']['lname']}}</td>
                    <td>{{$item['inventoryData']['type']['name']}}</td>
                    <td>Удалить / Редактировать</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
