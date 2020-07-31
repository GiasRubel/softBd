<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $links = Employee::paginate(5);
        return view('welcome', compact('links'));
    }

    public function fetch_data()
    {
        $data = Employee::with('designation')->paginate(5);
        return response()->json([$data]);
    }


    public function update(Request $request)
    {
       foreach($request->newArray as $data) {
           $employee = Employee::find($data["id"]);
           $employee->fill($data);
           $employee->save();
       }
        return response()->json(['message' => 'updated']);
    }

}
