<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 20.05.2018
 * Time: 2:47
 */

namespace App\Http\Controllers;


use App\Inventory;
use App\Type;
use App\User;

class InventoryController
{

    public function addForm()
    {

    }

    public function editForm()
    {

    }

    public function deleteForm()
    {

    }

    public function dashboard()
    {
        $templateData = [];
        $inventoryData = Inventory::all();

        foreach ($inventoryData->toArray() as $item) {
            $userData = User::where([['id', '=', $item['user_id']]])->first();
            $typeData = Type::where([['id', '=', $item['type_id']]])->first();
            $templateData[] = [
                'userData' => $userData->toArray(),
                'inventoryData' => [
                    'inventory' => $item,
                    'type' => $typeData->toArray(),
                ]
            ];
        }
        //dd($templateData);
        return view('Inventory.dashboard', ['data' => $templateData]);
    }
}