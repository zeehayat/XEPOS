<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService{

    public function show($id):?Employee{
        return Employee::find($id);
    }

    public function showAll():Object{
            return Employee::all();
    }

    public function save(array $data):?Employee{
        return Employee::create([
            'first_name' => $data['first_name'],
            'last_name'=>$data['last_name'],
            'company_id'=>$data['company_id'],
            'email'=>$data['email'],
            'phone'=>$data['phone']
        ]);
    }
    public function edit(array $data, $id):?Employee{
        $employee=Employee::find($id);


            $employee->first_name= $data['first_name'];
            $employee->last_name=$data['last_name'];
            $employee->company_id=$data['company_id'];
            $employee->email=$data['email'];
            $employee->phone=$data['phone'];

            $employee->save();
            return $employee;

    }
    public function delete($id):bool{
        return Employee::destroy($id);
    }
}
