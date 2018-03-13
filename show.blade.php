
@extends('employee.master')
@section('content')
  <div class="container">
   
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Dept_name</th>
        <th>Salary</th>
       
      </tr>
    </thead>
    <tbody>
     <tr>
        <td>{{ $employee->id}}</td>
        <td>{{ $employee->Name}}</td>
        <td>{{ $employee->salaries[0]->dept_name}}</td>
        <td>{{ $employee->salaries[0]->salary}}</td>
        
     </tr>
    </tbody>
  </table>
  </div>
@endsection
