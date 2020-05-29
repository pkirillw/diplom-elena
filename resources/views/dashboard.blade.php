@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Главная</h1>
        <a class="btn btn-primary pull-right" href="/report" style="color: #fff">Получить отчёт о инвентаре</a>
    </div>
    <h4>Последние поступления в ремонт</h4>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Тип оборудования</th>
                <th>Причина</th>
                <th>Дата поступления</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item['repairData']['id']}}</td>
                    <td>{{$item['inventoryData']['inventory']['name']}}</td>
                    <td>{{$item['inventoryData']['type']['name']}}</td>
                    <td>{{$item['repairData']['reason']}}</td>
                    <td>{{$item['repairData']['created_at']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
