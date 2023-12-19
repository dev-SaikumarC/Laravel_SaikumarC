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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mt-3 mb-4">Login</h3>

                <form method="post" id="register-form" enctype="multipart/form-data" action="{{ url('login') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 ">
                            <div class="card" style="padding:15px;">
                                <div class="form-group mb-3">
                                    <label for="email"> Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp" placeholder="Enter email" required
                                        value="<?php echo session('emailvalue') ?>">
                                    <h6 style="color:red;"> <?php echo session('error_email') ?></h6>

                                </div>
                                <div class="form-group">
                                    <label for="password"> Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        aria-describedby="nameHelp" placeholder="Enter Password" required
                                        value="{{ old('password') }}">

                                    <h6 style="color:red;">
                                        <?php echo session('passerror') ?>
                                    </h6>
                                </div><br>
                                <div class="form-group mb-2 text-center">
                                    <button type="submit" class="btn btn-success w-100">Login</button>
                                </div>
                                <h6 style="font-size:15px;">New User? <a href="{{ url('register') }}"
                                        class="text-success">Click here to Register</a></h6>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                        </div>
                    </div>
                </form>
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