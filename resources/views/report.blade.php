<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
      integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<table class="table table-bordered">
    @foreach($data as $item)
        <tr>
            <td colspan="5" style="font-size:24px;">{{$item['userdata']['fname']}} {{$item['userdata']['lname']}}</td>
        </tr>
        <tr>
            <th>Инв. номер</th>
            <th>Наименование</th>
            <th>Тип</th>
            <th>Поставщик</th>
            <th>Стоимость</th>
        </tr>
        @foreach($item['inventoryData'] as $inventoryDatum)
            <tr>
                <td>{{$inventoryDatum['inventNumber']}}</td>
                <td>{{$inventoryDatum['equipment']['name']}}</td>
                <td>{{$inventoryDatum['type']['name']}}</td>
                <td>{{$inventoryDatum['supplier']['name']}}</td>
                <td>{{$inventoryDatum['equipment']['cost']}}</td>
            </tr>
        @endforeach
    @endforeach
</table>