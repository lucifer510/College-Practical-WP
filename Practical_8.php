<!-- Write a php program to store the registration data in database, on successful registration
redirect user to login page -->

<?php
    $con = mysqli_connect("localhost","root","","phpdb");
    if(!$con)
    {
        die("Connection Error");
    }
    else
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
        $result = mysqli_query($con,$query);
        if($result)
        {
            header("Location: Practical_4.html");
        }
        else
        {
            echo "Error";
        }
    }
?>