<?php
    session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_name = $_POST['user_name']; 
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password)){
            
            $query = "select * from users where user_name = '$user_name' limit 1" ;

            $result = mysqli_query($con,$query);

            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location:index.php");
                        die;
                    }
                }
                echo "User Information is not matched";
            }
        }    
        else{
            echo "Please enter some valid information";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        #text{
            height :25px;
            border-radius : 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button{
            padding :10px;
            width: 100px;
            color:white;
            background-color: lightblue;
            border: none;
            align-items: center;
            justify-content: center;
        }

        #box{
            background-color :grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>
    <div id="box">
        <form action="" method="post">
            <div  style="font-size: 20px; margin :10px; ">Login</div>
            <input id="text" type="text" name= "user_name" placeholder="User name"><br><br>
            <input id="text" type="password" name= "password" placeholder="Password">
            <br><br>

            <input id="button" type="submit" value="Login">
            <br><br>
            <a href = "signup.php">SignUp here</a>
        </form>
    </div>
</body>
</html>