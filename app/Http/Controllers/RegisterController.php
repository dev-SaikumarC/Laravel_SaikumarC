<?php

namespace App\Http\Controllers;

use App\Models\RegisterModel;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('register');
    }

    public function login(Request $request): RedirectResponse
    {
        $model = new RegisterModel();
        $inputArr = $request->all();
        $email = $inputArr['email'];
        $password = $inputArr['password'];

        // Validate user credentials
        $admin = $model->where('email', $email)
            ->where('password', $password)
            ->first();


        $session = $request->session();
        $adminData = [
            'name' => $admin->name,
            // Add other necessary user data
        ];
        $session->put('admin_data', $adminData);



        if ($admin) {
            // return redirect()->to('employee');
            return redirect()->to('employee')->with('name', '<h5>Welcome: <span class="text-success"><b>' . $adminData['name'] . '</b></span></h5>');

        } else {
            return redirect()->to('/')->with('error', 'Invalid email or password');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $inputArr = $request->all();

        RegisterModel::insert([
            'email' => $inputArr['email'],
            'password' => $inputArr['password'],
            'name' => $inputArr['name'],
        ]);

        return redirect('/')->with('flash_message', 'Registered Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
