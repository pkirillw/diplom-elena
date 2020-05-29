@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Люди</h1>
        <a class="btn btn-primary pull-right" href="/users/add" style="color: #fff">Добавить человека</a>
    </div>
    <form method="post" action="/users/addUser">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1">Фамилия</label>
            <input name="fname" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="Иванов">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Имя</label>
            <input name="mname" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="Иван">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Отчество</label>
            <input name="lname" type="text" class="form-control" id="exampleFormControlInput1"
                   placeholder="Иванович">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Эл. почта</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1"
                   placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1"
                   placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</main>
