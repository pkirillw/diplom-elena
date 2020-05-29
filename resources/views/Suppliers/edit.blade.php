@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Люди</h1>
        <a class="btn btn-primary pull-right" href="/supplier/add" style="color: #fff">Добавить поставщика</a>
    </div>
    <form method="post" action="/supplier/editType">
        {{ csrf_field() }}
        <input type="hidden" name="supplier_id" value="{{$data['id']}}">
        <div class="form-group">
            <label for="exampleFormControlInput1">Наименование</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="ООО 'Рога и Копыта'" value="{{$data['name']}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Адрес</label>
            <textarea class="form-control" name="address">{{$data['address']}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Инн</label>
            <input name="inn" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="1234567890"  value="{{$data['inn']}}">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</main>