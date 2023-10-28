<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService{

    public static function show($id):?Employee{
        return Employee::find($id);
    }
    public static function showPaginated(){
        return Employee::paginate(2);
    }
    public static function showAll(int $count=0):Object{
            if($count == 0)
            return Employee::all();

            return Employee::paginate($count);
    }

    public static function save(array $data):?Employee{
        return Employee::create([
            'first_name' => $data['first_name'],
            'last_name'=>$data['last_name'],
            'company_id'=>$data['company_id'],
            'email'=>$data['email'],
            'phone'=>$data['phone']
        ]);
    }
    public static function edit(array $data, $id):?Employee{
        $employee=Employee::find($id);


            $employee->first_name= $data['first_name'];
            $employee->last_name=$data['last_name'];
            $employee->company_id=$data['company_id'];
            $employee->email=$data['email'];
            $employee->phone=$data['phone'];

            $employee->save();
            return $employee;

    }
    public static function delete($id):bool{
        return Employee::destroy($id);
    }
}
