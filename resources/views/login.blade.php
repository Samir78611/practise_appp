<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if(Session::has('success'))
        <h3 style="color:green">{{ Session::get('success') }}</h3>
    @endif
    @if(Session::has('fail'))
        <h3 style="color:red">{{ Session::get('fail') }}</h3>
    @endif
    <style>
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            /* Blue button */
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

    </style>
    </head>

    <body>
        <form action="{{url('userlogin')}}" method="POST">
            @csrf
            <h2>Login</h2>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <a href="{{url('signup')}}">If you don't have any account so click signup form</a>
    </body>

</html>
