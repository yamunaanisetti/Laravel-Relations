<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;

  class EmpController extends Controller
    {
        public function __construct()
          {
           $this->middleware('Emp');
          }
        public function index()
 		      {
  	  	  $employee = Employees::all()->toArray();
          // dd($employee);
       	  return view('employee.index', compact('employee'));
  		    }
        public function create()
  	   	  {
 	    	  return view('employee.create');
    	    }
        public function store(Request $request)
	        {
  	 		  $employee = new Employees([
          	'Id' => $request->get('Id'),
            'Employee_id' => $request->get('Employee_id'),
           	'Name' => $request->get('name'),
          	'Gender' => $request->get('gender'),
          	'Phone' => $request->get('phone'),
          	'Address' => $request->get('address'),
        		]);
          
        	Employees::create($request->all());
       		return redirect('/employee');
  		    }
        public function show($id)
  	      {
          $employee= Employees::with('salaries')->find($id);
          // dd($employee);
          \Log::info($employee);
          return view('employee.show',compact('employee'));
 		      }
        public function edit($id)
 	 	      {
 	 	      $employee= Employees::find($id);
 	  	    return view('employee.edit',compact('employee','id'));
          }
        public function update(Request $request,$id)
  		    {
 	 	      $employee = Employees::find($id);
		      $employee->id = $request->get('Id');
          $employee->Employee_id = $request->get('Employee_id');
          $employee->name = $request->get('name');
          $employee->gender = $request->get('gender');
          $employee->phone = $request->get('phone');
          $employee->address = $request->get('address');
          Employees::find($id)->update($request->all());
          return redirect('/employee');
  		    }
        public function destroy($id)
  	      {
          $employee = Employees::find($id);
          $employee->delete();
          return redirect('employee');
 		      }
    }
