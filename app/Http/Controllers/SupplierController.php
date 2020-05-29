<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 14.06.2018
 * Time: 0:14
 */

namespace App\Http\Controllers;


use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function dashboard()
    {
        $suppliersData = Supplier::all();
        $templateData = $suppliersData->toArray();
        return view('Suppliers.dashboard', ['data' => $templateData]);
    }

    public function deleteForm($id = 0)
    {
        $suppliersData = Supplier::where([['id', '=', $id]])->first();
        $templateData = $suppliersData->toArray();
        return view('Suppliers.delete', ['data' => $templateData]);
    }

    public function delete($id = 0)
    {
        $supplersData = Supplier::where([['id', '=', $id]])->first();
        $supplersData->delete();
        return redirect()->action('SupplierController@Dashboard');
    }

    public function addForm()
    {
        return view('Suppliers.add');
    }

    public function add(Request $request)
    {
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->address = $request->address;
        $supplier->inn = $request->inn;
        $supplier->save();

        return redirect()->action('SupplierController@Dashboard');
    }

    public function editForm($id = 0)
    {
        $suppliersData = Supplier::where([['id', '=', $id]])->first();

        return view('Suppliers.edit', ['data' => $suppliersData]);
    }

    public function edit(Request $request)
    {
        $suppliersData = Supplier::where([['id', '=', $request->supplier_id]])->first();

        if (empty($suppliersData)) {
            return redirect()->action('SupplierController@Dashboard');
        }


        $suppliersData->name = $request->name;
        $suppliersData->address = $request->address;
        $suppliersData->inn = $request->inn;

        $suppliersData->save();

        return redirect()->action('SupplierController@Dashboard');
    }
}