<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Employee;

use Illuminate\Http\Request;

// use Illuminate\Http\UploadedFile;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $employees = Employee::all();
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     // $input = $request->all();
    //     // Employee::create($input);
    //     // return redirect('employee')->with('flash_message', 'Employee Addedd!');
    //     $inputArr = $request->all();
    //     $filename = '';
    //     if ($request->hasFile('profile_image')) {
    //         $image = $request->file('profile_image');
    //         $filename = $image->getClientOriginalName();
    //         $image->move('uploads', $filename);
    //     }

    //     Employee::insert([
    //         'name' => $inputArr['name'],
    //         'address' => $inputArr['address'],
    //         'mobile' => $inputArr['mobile'],
    //         'profile_image' => $filename,
    //     ]);
    //     return redirect('employee')->with('flash_message', 'Employee Addedd!');
    //     // print_r($filename);
    // }


    public function store(Request $request)
    {
        $inputArr = $request->all();
        $filename = '';

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');

            // Check if the uploaded file is an image
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $image->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect('employee/create')->with('error_message', 'Invalid file type. Please upload an image.');
            }

            $filename = $image->getClientOriginalName();
            $image->move('uploads', $filename);
        }

        Employee::insert([
            'name' => $inputArr['name'],
            'address' => $inputArr['address'],
            'mobile' => $inputArr['mobile'],
            'profile_image' => $filename,
        ]);

        return redirect('employee')->with('flash_message', 'Employee Added!');
    }

    /**
     * Display the specified resource.r
     */
    public function show(string $id): View
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employees', $employee);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $employee = Employee::find($id);
        return view('employees.edit')->with('employees', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $employee = Employee::find($id);

        // if (!$employee) {
        //     // Handle the case where the employee with the given ID is not found.
        //     return redirect('employee')->with('error_message', 'Employee not found.');
        // }

        $inputArr = $request->all();
        $filename = '';

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');

            // Check if the uploaded file is an image
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $image->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect('/employee/' . $id . '/edit')->with('error_message', 'Invalid file type. Please upload an image.');
            }

            $filename = $image->getClientOriginalName();
            $image->move('uploads', $filename);
        }

        $employee->update([
            'name' => $inputArr['name'],
            'address' => $inputArr['address'],
            'mobile' => $inputArr['mobile'],
            'profile_image' => $filename,
        ]);

        return redirect('employee')->with('flash_message', 'Employee Updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'Employee deleted!');
    }
}
