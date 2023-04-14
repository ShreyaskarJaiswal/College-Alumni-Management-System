<?php
    session_start();

        include("connection.php");
        include("functions.php");

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
            {
                $query = "select * from users where user_name = '$user_name' limit 1";

                $result = mysqli_query($con, $query);
                if($result)
                {
                    if($result && mysqli_num_rows($result) > 0)
                    {
                        $user_data = mysqli_fetch_assoc($result);
                        if($user_data['password'] === $password)
                        {
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: index.php");
                            die;
                        }
                    }
                }
                echo "Please enter vaid information";

                
            }
            else
            {
                echo "Please enter vaid information";
            }
        } 
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resposiveloginpage.css">
    <script type="text/javascript" src="https://kit.fontawesome.com/c26cd2166c.js"></script>
</head>
<body>
    <section class="login py-5 bg-light">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="DSC_5577.jpeg" class="ig-fluid" alt="Ashoka Image">
                </div>
                <div class="col-lg-7 text-center py-5">
                    <h1>Ashoka Institute of Technology & Management</h1>
                    <form method="post">
                        <div class="form-row py-3 pt-5">
                            <div class="offset-1 col-lg-10">
                                <input class="inp px-3" type="text" name="user_name" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-row py-3">
                            <div class="offset-1 col-lg-10">
                                <input class="inp px-3" type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-row py-3">
                            <div class="offset-1 col-lg-10">
                                <input type="submit" value="Login" class="btn1">
                            </div>
                        </div>
                        <div class="form-row py-3">
                            <div class="offset-1 col-lg-10">
                                <a href="signup.php" class="btn1">signup</a>
                            </div>
                        </div>
                    </form>
                    <p>or login with</p>
                    <span><i class="fab fa-facebook"></i></span>
                    <span><i class="fab fa-google-plus"></i></span>
                </div>
            </div>
        </div>
    </section>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>