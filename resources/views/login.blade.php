<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;

            display: flex;
            justify-content: center;
            align-items: center;

            height: 100vh;
        }

        .login-box {
            width: 350px;
            background-color: white;

            padding: 30px;

            border: 1px solid #222;
            border-radius: 8px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;

            color: #111;
        }

        label {
            display: block;
            margin-bottom: 7px;

            font-weight: bold;
            color: #222;
        }

        input {
            width: 100%;
            padding: 10px;

            border: 1px solid #999;
            border-radius: 4px;

            margin-bottom: 18px;

            font-size: 14px;
        }

        input:focus {
            outline: none;
            border: 1px solid #000;
        }

        button {
            width: 100%;
            padding: 10px;

            background-color: #000;
            color: white;

            border: none;
            border-radius: 4px;

            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }

        .error {
            background-color: #eee;
            color: #000;

            border-left: 4px solid #000;

            padding: 10px;
            margin-bottom: 20px;

            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <h2>Login</h2>

        @if(session('error'))
            <p class="error">
                {{ session('error') }}
            </p>
        @endif

        <form action="/check-login" method="GET">

            <label>Username:</label>
            <input
                type="text"
                name="username"
                placeholder="Enter username"
            >

            <label>Password:</label>
            <input
                type="password"
                name="password"
                placeholder="Enter password"
            >

            <button type="submit">
                Login
            </button>

        </form>

    </div>

</body>
</html>