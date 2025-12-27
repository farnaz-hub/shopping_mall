<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        html,body {
            height: 100%;
            background-image: url("/background.jpg");
        }

        .login_box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 400px;
            padding: 25px;
            background: rgba(225, 223, 223, 0.8);
            border-radius: 6px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
<div class="login-wrapper">
    <form id="login-form" class="login_box" method="post" action="{{route('login.login')}}">
        @csrf
        <h2 class="text-center">Login</h2>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control text-center" required>
        </div>

        <div class="clearfix"></div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control text-center" required>
        </div>

        <div class="clearfix"></div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember" class="form-check-input" value="1">
                Remember Me
            </label>
        </div>

        <div class="clearfix"></div>

        <button class="btn btn-round btn-block" type="submit">Login</button>
    </form>
</div>
</body>
</html>
