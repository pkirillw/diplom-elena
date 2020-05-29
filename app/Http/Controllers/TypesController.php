<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 20.05.2018
 * Time: 2:47
 */

namespace App\Http\Controllers;


use App\Type;
use Illuminate\Http\Request;

class TypesController
{


    public function dashboard()
    {
        $typeData = Type::all();
        $templateData = $typeData->toArray();
        return view('Types.dashboard', ['data' => $templateData]);
    }




    public function deleteForm($id = 0)
    {
        $typeData = Type::where([['id', '=', $id]])->first();
        $templateData = $typeData->toArray();
        return view('Types.delete', ['data' => $templateData]);
    }

    public function delete($id = 0)
    {
        $typeData = Type::where([['id', '=', $id]])->first();
        $typeData->delete();
        return redirect()->action('TypesController@Dashboard');
    }

    public function addForm()
    {
        return view('Types.add');
    }

    public function add(Request $request)
    {
        $supplier = new Type();
        $supplier->name = $request->name;
        $supplier->save();

        return redirect()->action('TypesController@Dashboard');
    }

    public function editForm($id = 0)
    {
        $typesData = Type::where([['id', '=', $id]])->first();

        return view('Types.edit', ['data' => $typesData]);
    }

    public function edit(Request $request)
    {
        $typesData = Type::where([['id', '=', $request->type_id]])->first();

        if (empty($typesData)) {
            return redirect()->action('TypesController@Dashboard');
        }

        $typesData->name = $request->name;
        $typesData->save();

        return redirect()->action('TypesController@Dashboard');
    }

}