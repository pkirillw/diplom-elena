<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 20.05.2018
 * Time: 2:52
 */

namespace App\Http\Controllers;


use App\Decommission;
use App\Equipment;
use App\Inventory;
use App\Supplier;
use App\Repair;
use App\Type;
use App\User;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $templateData = [];
        $repairItems = Repair::all();

        foreach ($repairItems->toArray() as $item) {
            $decommisionData = Decommission::where([['inventory_id', '=', $item['inventory_id']]])->first();
            if (empty($decommisionData))
            {
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
        }
        return view('dashboard', ['data' => $templateData]);
    }

    public function report()
    {
        $templateData = [];

        $userData = User::all();

        foreach ($userData->toArray() as $userDatum) {
            $inventoryData = Inventory::where([['user_id', '=', $userDatum['id']]])->get();
            foreach ($inventoryData as $inventoryDatum) {
                $decommisionData = Decommission::where([['inventory_id', '=', $inventoryDatum->id]])->first();
                if (empty($decommisionData))
                {
                    $equipmentData = Equipment::where([['id', '=', $inventoryDatum->equipment_id]])->first();
                    $supplierData = Supplier::where([['id', '=', $equipmentData->supllier_id]])->first();
                    $typeData = Type::where([['id', '=', $equipmentData->type_id]])->first();
                    $repairData = Repair::where([['inventory_id', '=', $inventoryDatum->id]])->first();
                    $repairFlag = intval(!empty($repairData));
                    $itemData = [
                        'supplier' => $supplierData->toArray(),
                        'type' => $typeData->toArray(),
                        'equipment' => $equipmentData->toArray(),
                        'inventNumber' => $inventoryDatum->id,
                        'repair' => $repairFlag,
                    ];
                    $templateData[$userDatum['id']]['inventoryData'][] = $itemData;
                    $templateData[$userDatum['id']]['userdata'] = $userDatum;
                }

            }
        }
        return view('report', ['data' => $templateData]);
        dd($templateData);
    }
}