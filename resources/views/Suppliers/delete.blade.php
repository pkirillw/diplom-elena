@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Поставщики</h1>
        <a class="btn btn-primary pull-right"  href="/supplier/add" style="color: #fff">Добавить поставщика</a>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">Удаление поставщика</h1>
        <p class="lead">Вы уверены что хотите удалить
            поставщика <strong
                    style="font-size: 20px;">{{$data['name']}}</strong>
        </p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg pull-left" href="/supplier/deleteSupplier/{{$data['id']}}"
           role="button">Удалить</a>
        <a class="btn btn-primary btn-lg pull-right" href="/supplier/dashboard" role="button">Назад</a>
    </div>
</main>