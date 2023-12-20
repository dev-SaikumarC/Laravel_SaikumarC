<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <?php
    // Retrieve user data from session
    $session = session();
    $adminData = $session->get('admin_data');
    // print_r($userData);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mt-3 mb-4">Create Profile</h3>

                <div class="container d-flex flex-column justify-content-center" style="max-width:500px;">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <b>Create Profile</b>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <b><a class="text-success text-right" href="<?php echo url('employee') ?>">Go
                                            Back</a></b>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ url('profileCreate') }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}


                                <div class="row">
                                    <div class="col-6">
                                        <label>Role</label></br>
                                        <input type="text" name="role" id="role" class="form-control" required></br>
                                    </div>
                                    <div class="col-6">
                                        <label>Company</label></br>
                                        <input type="text" name="company" id="company" class="form-control"
                                            required></br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>Mobile</label></br>
                                        <input type="text" name="mobile" id="mobile" class="form-control" required></br>
                                    </div>
                                    <div class="col-6">
                                        <label>Experience</label></br>
                                        <input type="number" name="experience" id="experience" class="form-control"
                                            required></br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>Gender</label></br>
                                        <select class="form-select" aria-label="Default select example" name="gender">
                                            <option selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>DOB</label></br>
                                        <input type="date" name="dob" id="dob" class="form-control" required></br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label>Country</label></br>
                                        <input type="text" name="country" id="country" class="form-control"
                                            required></br>
                                    </div>
                                    <div class="col-6">
                                        <label for="profile_image">Profile Picture</label></br>
                                        <input type="file" class="form-control" name="profile_image" id="profile_image"
                                            required></br>
                                        <input type="text" class="form-control" name="admin_id" id="admin_id" hidden
                                            required value="<?php echo $adminData['id']; ?>"></br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <input type="submit" value="Save" class="btn btn-success"
                                            style="width:200px;"></br>
                                    </div>
                                </div>
                                <h6 class="text-danger">
                                    <?php echo session('error_message') ?>
                                </h6><br>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>