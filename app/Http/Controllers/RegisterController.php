<?php

namespace App\Http\Controllers;

use App\Models\RegisterModel;
use App\Models\ProfileModel;
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
        // Validation rules
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        // Convert email to lowercase
        $email = strtolower($validatedData['email']);
        $password = $validatedData['password'];

        // Check if user exists with the given email
        $admin = $model::where('email', $email)->first();

        if ($admin) {
            if ($admin->password === $password) {

                $profileState = 0;
                $profilemodel = new ProfileModel();
                $profiledata['adminprofile'] = $profilemodel->all();

                foreach ($profiledata['adminprofile'] as $profile) {
                    if ($admin['id'] == $profile['admin_id']) {
                        // Set profile state to '1' and exit the loop
                        $profileState = 1;
                        break;
                    }
                }
                
                $session = $request->session();
                $adminData = [
                    'name' => $admin->name,
                    'id' => $admin->id,
                    'state' => $profileState,
                    // Add other necessary user data
                ];
                $session->put('admin_data', $adminData);
                // $session->forget('entered_email');
                return redirect()->to('employee');

            } else {
                // Invalid email or password
                return redirect()->to('/')->with('passerror', 'invalid password')->with('emailvalue', $email);
            }
        } else {
            return redirect()->to('/')->with('error_email', 'Invalid email');
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
        // Validation rules
        $rules = [
            'name' => 'required|min:3|alpha',
            'email' => 'required|email|unique:adminregister|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/|max:255',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ];

        // Custom validation messages
        $messages = [
            'name.min' => 'Name should be at least 3 characters.',
            'name.alpha' => 'Name should contain only alphabets.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already in use.',
            'email.regex' => 'Please provide a valid email address.',
            'password.min' => 'Password should be at least 8 characters.',
            'password.regex' => 'Password should contain at least one lowercase letter, one uppercase letter, and one number.',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules, $messages);

        // Create a new admin record
        RegisterModel::insert([
            'email' => strtolower($validatedData['email']),
            'password' => $validatedData['password'],
            'name' => $validatedData['name'],
        ]);

        return redirect('/')->with('success_message', 'Registered Successfully!');
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
