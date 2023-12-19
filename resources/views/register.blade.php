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
                <h3 class="text-center mt-3 mb-4">Register</h3>

                <form method="post" id="register-form" enctype="multipart/form-data"
                    action="{{ url('RegisterProcess') }}">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 ">
                            <div class="card" style="padding:15px;">
                                <div class="form-group mb-3">
                                    <label for="name"> Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="nameHelp" placeholder="Enter Name" required
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <p class="" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email"> Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp" placeholder="Enter email" required
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <p class="" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password"> Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        aria-describedby="nameHelp" placeholder="Enter Password" required
                                        value="{{ old('password') }}">
                                    @error('password')
                                    <p class="" style="color:red">{{ $message }}</p>
                                    @enderror
                                </div><br>
                                <div class="form-group mb-2 text-center">
                                    <button type="submit" class="btn btn-success w-100">Register</button>
                                </div>
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
<!-- <script>
    function saveRegister(e)
    {
        e.preventDefault();
        console.log($('#register-form'));
        var registerData = $('#register-form')[0];
        var formData = new FormData(registerData);

        $.ajax({
            url:"{{url('saveRegister')}}",
            method:"POST",
            data:formData,
            contentType:false,
            processData:false,
            success:function(response){
                console.log(response);
            }
        })
    }
</script> -->

</html>