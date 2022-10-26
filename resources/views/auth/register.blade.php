<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Using Bootstrap for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="name" name="name" id="name" class="form-control"
                                    placeholder="Your name">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Your email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Your password">
                                <label for="password">Password</label>
                            </div>

                            <div class="row">
                                <div class="col-1"></div>
                                <button class="col-4 btn btn-primary btn-login text-uppercase fw-bold"
                                    type="submit">Register</button>
                                <div class="col-2"></div>
                                <a class="col-4 text-uppercase fw-bold" href="/login">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
