@extends('employees.layout')
@section('content')
<div class="container-fluid mt-5">
    <?php
    // Retrieve user data from session
    $session = session();
    $adminData = $session->get('admin_data');
    // print_r($userData);
    ?>
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <div class="row">
                <div class="col-6">
                    <h5 class="mt-3 mb-3">Welcome: <span class="text-success"><b>
                                <?php echo $adminData['name']; ?>
                            </b>
                        </span>
                    </h5>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <?php if ($adminData['state'] == '1') : ?>
                    <a href="{{ url('/updateProfile') }}" class="btn btn-success btn-sm mb-3 mt-2" style="width:200px;"
                        title="Add New Employeee"> Update Profile
                    </a>
                    <?php endif; ?>
                    <?php if ($adminData['state'] == '0') : ?>
                    <a href="{{ url('/createProfile') }}" class="btn btn-success btn-sm mb-3 mt-2" style="width:200px;"
                        title="Add New Employeee"> Create Profile
                    </a>
                    <?php endif; ?>
                </div>
                <div class="col-1 d-flex justify-content-end">
                    <a href="{{ url('/logout') }}" class="btn btn-danger btn-sm mb-3 mt-2" style="width:100px;"
                        title="Add New Employeee"> Logout
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4><b>Employee Details</b></h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/employee/create') }}" class="btn btn-success btn-sm mb-3 mt-2"
                        style="width:200px;" title="Add New Employeee">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Profile</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td><img src="../uploads/{{ $item->profile_image }}" style="height:100px;"></td>

                                    <td class="text-end">
                                        <a href="{{ url('/employee/' . $item->id) }}" title="View Employee"><button
                                                class="btn btn-info btn-sm" style="width:80px;"><i class="fa fa-eye"
                                                    aria-hidden="true"></i>
                                                View</button></a>
                                        <a href="{{ url('/employee/' . $item->id . '/edit') }}"
                                            title="Edit Employee"><button class="btn btn-primary btn-sm"
                                                style="width:80px;"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i>
                                                Edit</button></a>

                                        <form method="POST" action="{{ url('/employee' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" style="width:80px;"
                                                title="Delete Employee"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection