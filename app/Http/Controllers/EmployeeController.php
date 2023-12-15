<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Employee;

use Illuminate\Http\Request;

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
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Employee::create($input);
        return redirect('employee')->with('flash_message', 'Employee Addedd!');
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
        $input = $request->all();
        $employee->update($input);
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
