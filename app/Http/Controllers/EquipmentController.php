<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 03.06.2018
 * Time: 16:29
 */

namespace App\Http\Controllers;

use App\Decommission;
use App\Equipment;
use App\Inventory;
use App\Supplier;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class EquipmentController
{
    public function dashboard()
    {
        $templateData = [];

        $equipmentData = Equipment::all();

        foreach ($equipmentData->toArray() as $item) {

            $supplierData = Supplier::where([['id', '=', $item['supllier_id']]])->first();
            $typeData = Type::where([['id', '=', $item['type_id']]])->first();
            $inventoryData = Inventory::where([['equipment_id', '=', $item['id']]])->get();
            $usersData = [];


            foreach ($inventoryData->toArray() as $inventoryItem) {
                $decommisionData = Decommission::where([['inventory_id', '=', $inventoryItem['id']]])->first();
                if (empty($decommisionData)) {
                    $userData = User::where([['id', '=', $inventoryItem['user_id']]])->first();
                    $userData = $userData->toArray();
                    $userData['inv_number'] = $inventoryItem['id'];
                    $usersData[] = $userData;
                }
            }
            $templateData[$item['type_id']]['data'] = $typeData->toArray();
            $templateData[$item['type_id']]['items'][] = [
                'userData' => $usersData,
                'supplierData' => $supplierData->toArray(),
                'equipmentData' => [
                    'equipment' => $item,
                    'type' => $typeData->toArray(),
                ]
            ];
        }
        return view('Equipment.dashboard', ['data' => $templateData]);
    }

    public function addForm()
    {
        $types = Type::all();
        $supplier = Supplier::all();
        $templateData = [
            'types' => $types->toArray(),
            'suppliers' => $supplier->toArray()
        ];
        return view('Equipment.add',  ['data' => $templateData]);
    }

    public function add(Request $request)
    {
        $equipment = new Equipment();
        $equipment->type_id = $request->type;
        $equipment->supllier_id = $request->supplier;
        $equipment->name = $request->name;
        $equipment->warranty = $request->warranty;
        $equipment->cost = $request->cost;
        $equipment->count = $request->count;
        $equipment->save();
        for ($i = 0; $i < $equipment->count; $i++) {
            $inventory = new Inventory();
            $inventory->equipment_id = $equipment->id;
            $inventory->user_id = 3;
            $inventory->count = 1;
            $inventory->save();
        }
        return redirect()->action('EquipmentController@Dashboard');
    }
}