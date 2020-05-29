<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 20.05.2018
 * Time: 2:47
 */

namespace App\Http\Controllers;


use App\Equipment;
use App\Inventory;
use App\Repair;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class RepairController
{
    public function addForm($id = 0)
    {
        $inventoryData = Inventory::where([['id', '=', $id]])->first();
        $equipData = Equipment::where([['id', '=', $inventoryData->equipment_id]])->first();
        $typeData = Type::where([['id', '=', $equipData->type_id]])->first();
        $userData = User::where([['id', '=', $inventoryData->user_id]])->first();
        $templateData = [
            'inventory' => $inventoryData->toArray(),
            'equipment' => $equipData->toArray(),
            'userdata' => $userData->toArray(),
            'type' => $typeData->toArray()
        ];
        return view('Repair.add', ['data' => $templateData]);
    }

    public function add(Request $request)
    {
        $repair = new Repair();
        $repair->inventory_id = $request->inventory_id;
        $repair->reason = $request->reason;
        $repair->save();
        return redirect()->action('RepairController@Dashboard');
    }

    public function check($id = 0)
    {
        $repairData = Repair::where([['id', '=', $id]])->first();
        $repairData->delete();
        return redirect()->action('RepairController@Dashboard');
    }

    public function dashboard()
    {
        $templateData = [];
        $repairItems = Repair::all();

        foreach ($repairItems->toArray() as $item) {
            $inventoryData = Inventory::where([['id', '=', $item['inventory_id']]])->first();
            $userData = User::where([['id', '=', $inventoryData['user_id']]])->first();
            $equipData = Equipment::where([['id', '=', $inventoryData->equipment_id]])->first();
            $typeData = Type::where([['id', '=', $equipData->type_id]])->first();
            $templateData[] = [
                'repairData' => $item,
                'userData' => $userData->toArray(),
                'inventoryData' => [
                    'inventory' => $equipData->toArray(),
                    'type' => $typeData->toArray(),
                ]
            ];
        }
        return view('Repair.dashboard', ['data' => $templateData]);
    }
}