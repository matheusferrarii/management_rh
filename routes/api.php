<?php
use App\Models\Department;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/department' , function (Request $request) {
    $department = new Department();
    $department->name = $request->input('name');;
    $department->description = $request->input('description' );;
    $department->save();
    return response()->json($department);
   });

Route::post('/employee' , function (Request $request) {
    $employee = new Employee();
    $employee->name = $request->input('name');;
    $employee->email = $request->input('email');;
    $employee->department_id = $request->input('department_id');;
    $employee->save();
    return response()->json($employee);
   });

Route::get('/department' , function () {
    $department = Department::all();
    return response()->json($department);
   });

Route::get('/employee' , function () {
    $employee = Employee::all();
    return response()->json($employee);
   });

Route::get('/department/{id}' , function ($id) {
    $department = Department::find($id);
    if ($department) {
        return response()->json($department);
    } else {
        return response()->json(['message' => 'Department not found'], 404);
    }
   });

Route::get('/employee/{id}' , function ($id) {
    $employee = Employee::find($id);
    if ($employee) {
        return response()->json($employee);
    } else {
        return response()->json(['message' => 'Employee not found'], 404);
    }
   });

Route::get('/department/delete/{id}' , function ($id) {
    $department = Department::find($id);
    if ($department) {
        $department->delete();
        return response()->json(['message' => 'Department deleted successfully']);
    } else {
        return response()->json(['message' => 'Department not found'], 404);
    }
   });

Route::get('/employee/delete/{id}' , function ($id) {
    $employee = Employee::find($id);
    if ($employee) {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    } else {
        return response()->json(['message' => 'Employee not found'], 404);
    }
   });

Route::put('/department/update/{id}' , function (Request $request, $id) {
    $department = Department::find($id);
    if ($department) {
        $department->name = $request->input('name');;
        $department->description = $request->input('description');;
        $department->save();
        return response()->json(['message' => 'department updated successfully', 'department' => $department]);
    } else {
        return response()->json(['message' => 'department not found'], 404);
    }
   });

Route::put('/employee/update/{id}' , function (Request $request, $id) {
    $employee = Employee::find($id);
    if ($employee) {
        $employee->name = $request->input('name');;
        $employee->email = $request->input('email');;
        $employee->department_id = $request->input('department_id');;
        $employee->save();
        return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee]);
    } else {
        return response()->json(['message' => 'Employee not found'], 404);
    }
   });

Route::get('/department-has-employee', function () {
    $departments = Department::with('employees')->get();
    return response()->json($departments);
});

Route::get('/employee-has-department', function () {
    $employees = Employee::with('department')->get();
    return response()->json($employees);
});

Route::get('/employee/{id}/department', function ($id) {
    $employee = Employee::with('department')->find($id);
    
    if ($employee) {
        return response()->json($employee->department);
    } else {
        return response()->json(['message' => 'Funcionário não encontrado'], 404);
    }
});

Route::get('/department/{id}/employee', function ($id) {
    $department = Department::with('employees')->find($id);

    if ($department) {
        return response()->json($department->employees);
    } else {
        return response()->json(['message' => 'Departamento não encontrado'], 404);
    }
});