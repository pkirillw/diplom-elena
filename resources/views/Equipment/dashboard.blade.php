@extends('Layouts.app')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Инвентарь</h1>
        <a class="btn btn-primary pull-right" href="/equipment/add" style="color: #fff">Добавить технику</a>
    </div>
    <div class="accordion" id="accordionz">
        @foreach($data as $item)

            <div class="card">
                <div class="card-header" id="headingz{{$loop->index}}">
                    <h5 class="mb-0">
                        <b>{{$item['data']['name']}}</b>
                        <button class="btn btn-link pull-right" type="button" data-toggle="collapse"
                                data-target="#collapsez{{$loop->index}}" aria-expanded="true"
                                aria-controls="collapsez{{$loop->index}}">
                            <span data-feather="chevron-down"></span>
                        </button>
                    </h5>
                </div>

                <div id="collapsez{{$loop->index}}" class="collapse"
                     aria-labelledby="headingz{{$loop->index}}"
                     data-parent="#accordionz"
                     style="border-bottom: 1px solid rgb(221, 221, 221);">
                    <div class="card-body">
                        <div class="accordion" id="accordion">
                            @foreach($item['items'] as $itemEq)
                                <div class="card">
                                    <div class="card-header"
                                         id="heading{{$itemEq['equipmentData']['equipment']['id']}}">
                                        <h5 class="mb-0">
                                            <b>{{$itemEq['equipmentData']['equipment']['name']}}</b> ({{$itemEq['equipmentData']['equipment']['cost']}} руб.)
                                            <button class="btn btn-link pull-right" type="button" data-toggle="collapse"
                                                    data-target="#collapse{{$itemEq['equipmentData']['equipment']['id']}}"
                                                    aria-expanded="true"
                                                    aria-controls="collapse{{$itemEq['equipmentData']['equipment']['id']}}">
                                                <span data-feather="chevron-down"></span>
                                            </button>
                                            <span data-toggle="tooltip" data-html="true" class="pull-right"
                                                  title="{{$itemEq['supplierData']['name']}}<br> {{$itemEq['supplierData']['address']}}<br> {{$itemEq['supplierData']['inn']}}">Поставщик</span>

                                        </h5>
                                    </div>

                                    <div id="collapse{{$itemEq['equipmentData']['equipment']['id']}}" class="collapse"
                                         aria-labelledby="heading{{$itemEq['equipmentData']['equipment']['id']}}"
                                         data-parent="#accordion"
                                         style="border-bottom: 1px solid rgb(221, 221, 221);">
                                        <div class="card-body">
                                            <table class="table-bordered">
                                                <tr>
                                                    <th>Инвентарный номер</th>
                                                    <th>Ответственный</th>
                                                </tr>
                                                @foreach($itemEq['userData'] as $user)
                                                    <tr>
                                                        <td>{{$user['inv_number']}}</td>
                                                        <td><a href="/users/equipment/{{$user['id']}}">{{$user['fname']}} {{$user['lname']}}</a></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


        @endforeach
    </div>
</main>
