<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 20.05.2018
 * Time: 3:39
 */

namespace App\Http\Controllers;

use App\Decommission;
use App\Equipment;
use App\Inventory;
use App\Repair;
use App\Supplier;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function dashboard()
    {
        $usersData = User::all();
        $templateData = $usersData->toArray();
        return view('Users.dashboard', ['data' => $templateData]);
    }

    public function delete($id = 0)
    {
        $usersData = User::where([['id', '=', $id]])->first();
        $templateData = $usersData->toArray();
        return view('Users.delete', ['data' => $templateData]);
    }

    public function deleteUser($id = 0)
    {

        $usersData = User::where([['id', '=', $id]])->first();
        $usersData->delete();
        return redirect()->action('UsersController@Dashboard');
    }

    public function addForm()
    {
        return view('Users.add');
    }

    public function add(Request $request)
    {
        $userName = $request->fname . ' ' . $request->mname . ' ' . $request->lname;

        $user = new User();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->action('UsersController@Dashboard');
    }

    public function editForm($id = 0)
    {
        $userData = User::where([['id', '=', $id]])->first();

        $tempName = explode(' ', $userData['name']);

        $userData['fname'] = $tempName[0];
        $userData['mname'] = $tempName[1];
        $userData['lname'] = $tempName[2];

        return view('Users.edit', ['data' => $userData]);
    }

    public function editUser(Request $request)
    {
        $userData = User::where([['id', '=', $request->user_id]])->first();

        if (empty($userData)) {
            return redirect()->action('UsersController@Dashboard');
        }

        $userName = $request->fname . ' ' . $request->mname . ' ' . $request->lname;
        $userData->name = $userName;
        $userData->email = $request->email;

        if (!empty($request->password)) {
            $userData->password = bcrypt($request->password);
        }

        $userData->save();

        return redirect()->action('UsersController@Dashboard');;
    }

    public function equipment($id = 0)
    {
        $templateData = [];
        $userData = User::where([['id', '=', $id]])->first();
        $inventoryData = Inventory::where([['user_id', '=', $id]])->get();
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
                $templateData['inventoryData'][] = $itemData;
            }

        }
        $templateData['userData'] = $userData->toArray();
        return view('Users.equipment', ['data' => $templateData]);

    }
}