<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('adminPanel/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reset Password {{$phoneNumber}} </title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Mpwtcs</h1>
        </div>
        @if(count($errors))
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br />
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="resetpass-box">
            <form class="login-form" action="{!! route('resetPassword') !!}" method="POST">
                {{csrf_field()}}
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Reset Password ?</h3>
                <div class="form-group">
                    <input class="form-control" name="phoneNumber" type="hidden" value="{{$phoneNumber}}">
                </div>
                <div class="form-group">
                    <label class="control-label">OTP</label>
                    <input class="form-control otp" name="otp" required="required" type="text" minlength=6 maxlength=10 placeholder="OTP" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">New password</label>
                    <input class="form-control" name="newPassword" required="required" type="password" minlength=8 maxlength=16 placeholder="********" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm password</label>
                    <input class="form-control" name="confirmPassword" required="required" type="password" minlength=8 maxlength=16 placeholder="********">
                </div>
                <div class="form-group">
                    <input class="form-control" name="source" type="hidden" value="Admin">
                </div>
                <div class="form-group">
                    <input class="form-control" name="language" type="hidden" value="English">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <p class="semibold-text mb-2"><a href="{!! route('resendOTP', ['phoneNumber'=>$phoneNumber , 'source' => $source , 'templateName'=>$templateName , 'language'=>$language ]) !!}" data-toggle="flip">Resend OTP?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('adminPanel/js/inputValidation.js') }}"></script>
    <script src="{{ asset('adminPanel/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('adminPanel/js/popper.min.js') }}"></script>
    <script src="{{ asset('adminPanel/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminPanel/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('adminPanel/js/plugins/pace.min.js') }}"></script>
</body>

</html>