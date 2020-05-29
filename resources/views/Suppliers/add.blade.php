@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Люди</h1>
        <a class="btn btn-primary pull-right" href="/supplier/add" style="color: #fff">Добавить поставщика</a>
    </div>
    <form method="post" action="/supplier/addSupplier">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1">Наименование</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="ООО 'Рога и Копыта'">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Адрес</label>
            <textarea class="form-control" name="address"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Инн</label>
            <input name="inn" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="1234567890">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</main>