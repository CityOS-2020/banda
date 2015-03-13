<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body background="imgs/b.jpg">

        <div class="container">

            <div class="header">
                <h1 class = "text animated slideInDown">Welcome to OS</h1>
                <hr/>
            </div>

            <!-- Login - START -->
            <div class="container">
                <div class="row colored">
                    <div class="contcustom">
                        <h2 class="text animated slideInDown">LogIn</h2>
                        <form action="{{ route('login') }}" method="post">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">

                                </div>
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
       
                    <button name="button" class="btn btn-default navbar-btn">Sign in</button>

                    </form>  
                </div>
            </div>
        </div>


        <!-- Login - END -->

    </div>

</body>
</html>