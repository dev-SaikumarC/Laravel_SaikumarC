<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\ProfileModel;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('profile');
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
        $filename = '';

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');

            // Check if the uploaded file is an image
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $image->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect('createProfile')->with('error_message', 'Invalid file type. Please upload an image.');
            }

            $filename = $image->getClientOriginalName();
            $image->move('uploads', $filename);
        }

        ProfileModel::insert([

            'admin_id' => $inputArr['admin_id'],
            'company' => $inputArr['company'],
            'role' => $inputArr['role'],
            'country' => $inputArr['country'],
            'mobile' => $inputArr['mobile'],
            'gender' => $inputArr['gender'],
            'dob' => $inputArr['dob'],
            'experience' => $inputArr['experience'],
            'profile_image' => $filename,
        ]);

        return redirect('employee')->with('flash_message', 'Profile Added!');
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
    public function edit(): View
    {
        $Admin = ProfileModel::all();
        return view('profileupdate')->with('admin', $Admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $inputArr = $request->all();
        $filename = '';
        
        $id = $inputArr['admin_id'];
        $admin = ProfileModel::find($id);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');

            // Check if the uploaded file is an image
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $extension = $image->getClientOriginalExtension();

            if (!in_array(strtolower($extension), $allowedExtensions)) {
                return redirect($id . '/updateProfile')->with('error_message', 'Invalid file type. Please upload an image.');
            }

            $filename = $image->getClientOriginalName();
            $image->move('uploads', $filename);
        }

        $admin->update([
            // 'admin_id' => $inputArr['admin_id'],
            'company' => $inputArr['company'],
            'role' => $inputArr['role'],
            'country' => $inputArr['country'],
            'mobile' => $inputArr['mobile'],
            'gender' => $inputArr['gender'],
            'dob' => $inputArr['dob'],
            'experience' => $inputArr['experience'],
            'profile_image' => $filename,
        ]);

        return redirect('employee')->with('flash_message', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
