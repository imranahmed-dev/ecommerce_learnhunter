<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Admin Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/css/default/app.min.css" rel="stylesheet" />
    <link href="{{asset('backend')}}/assets/fontawesome/css/font-awesome.min.css" rel="stylesheet" />

</head>

<body class="pace-top">

    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>


    <div id="page-container" class="fade">

        <div class="login login-v1">

            <div class="login-container">

                <div class="login-header">
                    <div class="brand">
                        <span class="logo"></span> Admin Login
                    </div>
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <div class="login-body">

                    <div class="login-content">
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>

                            <div class="form-group">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" autocomplete="password">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            <p class="my-3 text-center">
                                <a href="#">I forgot my password</a>
                            </p>
                        </form>
                    </div>

                </div>

            </div>

        </div>

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

    </div>


    <script src="{{asset('backend')}}/assets/js/app.min.js" type="text/javascript"></script>
    <script src="{{asset('backend')}}/assets/js/theme/default.min.js" type="-text/javascript"></script>

</body>

</html>