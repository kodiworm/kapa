<?php
//values from user input in the register form

$fullname = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//create connection with the database
$conn = new mysqli('localhost', 'root', '', 'kpa');

//check connection
if(mysqli_connect_error()){
    die('Connection error... ('. mysqli_connect_errno().')' .mysqli_connect_error());
}
else{
    $sql = "INSERT INTO users (fullname, username, email, password) 
                        values ('$fullname', '$username', '$email', '$password')";
        
        //check if $sql querry is working 
    if($conn->query($sql)){
        echo "Registered Successfully...";
    }
    else{
        echo "Error!  ". $sql. "<br>". $conn->error;
    }

    //close connection from database
    $conn -> close();

    //redirect to home page
    header("Location: ../index.html?Registration successfull");
}



