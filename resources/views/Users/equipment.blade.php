@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Люди</h1>
        <a class="btn btn-primary pull-right" href="/users/add" style="color: #fff">Добавить человека</a>
    </div>
    <div class="col-md-12">
        <h1 class="h2">{{$data['userData']['fname']}} {{$data['userData']['lname']}}</h1>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Наименование техники</th>
            <th>Тип техники</th>
            <th>Гарантия</th>
            <th>Поставщик</th>
            <th>Состояние</th>
            <th></th>
        </tr>
        @foreach($data['inventoryData'] as $inventory)
            <tr>
                <td>{{$inventory['inventNumber']}}</td>
                <td>{{$inventory['equipment']['name']}}</td>
                <td>{{$inventory['type']['name']}}</td>
                <td>{{date('d.m.Y H:i:s', $inventory['equipment']['warranty'])}}</td>
                <td>{{$inventory['supplier']['name']}}</td>
                <td>
                    @if($inventory['repair'])
                        В ремонте
                    @else
                        Работает
                    @endif
                </td>
                <td>
                    <a href="/repair/add/{{$inventory['inventNumber']}}">В ремонт</a>
                     <br>
                    <a href="/decommission/add/{{$inventory['inventNumber']}}">Списать</a>
                </td>
            </tr>
        @endforeach
    </table>
</main>
