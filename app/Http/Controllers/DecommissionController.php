<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 14.06.2018
 * Time: 0:14
 */

namespace App\Http\Controllers;

use App\Decommission;
use App\Equipment;
use App\Inventory;
use App\Repair;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class DecommissionController extends Controller
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
        return view('Decommission.add', ['data' => $templateData]);
    }

    public function addDecommission(Request $request)
    {
        $decommission = new Decommission();
        $decommission->inventory_id = $request->inventory_id;
        $decommission->reason = $request->reason;
        $decommission->save();
        return redirect()->action('DecommissionController@Dashboard');
        dd($request->all());
    }
    public function dashboard()
    {
        $templateData = [];
        $decommissionItems = Decommission::all();

        foreach ($decommissionItems->toArray() as $item) {
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
        return view('Decommission.dashboard', ['data' => $templateData]);
    }
}