<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

//database connection
$conn=new mysqli('localhost','root','','ncc form');

if($conn->connect_error) {
    die('connection failed:'.$conn->connect_error);
} else {
    echo "Connection Successful!";

    $stmt=$conn->prepare("insert into ncc (name,gender,age,email,phone) value(?,?,?,?,?)");
    $stmt->bind_param("ssisi",$name,$gender,$age,$email,$phone);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details submitted</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Thanks for submitting </h1>
</body>
</html>