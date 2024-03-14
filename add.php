
<?php

$errors=[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "gkb";
    $db_user = "root";
    $db_pass = "";   
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
    }
    $requires = ['fullname', 'email', 'age','dateOfBirth'];
    foreach ($requires as $require) {
        if (empty($_POST[$require])) {
            $errors[$require] = " Please enter the $require  ";
        }
    }
    
  
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "please valid email";
    }

    if(empty($errors)) {
        $check_email_sql = "SELECT * FROM users WHERE email = ?";
        $check_email_stmt = mysqli_prepare($conn, $check_email_sql);
        if ($check_email_stmt) {
            mysqli_stmt_bind_param($check_email_stmt, "s", $_POST['email']);
            mysqli_stmt_execute($check_email_stmt);
            mysqli_stmt_store_result($check_email_stmt);
            if (mysqli_stmt_num_rows($check_email_stmt) > 0) {
                $errors['email'] = "Email already exists";
            }
        } 
    }
    if(empty($errors)) {
        $sql = "INSERT INTO users (fullname, email, age, dateOfBirth)
                VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            mysqli_stmt_bind_param(
                $stmt,"ssss",$_POST['fullname'],$_POST['email'],$_POST['age'],$_POST['dateOfBirth']);
                if (mysqli_stmt_execute($stmt)) {
                $message="successfully registered";
                echo"<script>alert('$message');</script>";
               echo" <script>
                    setTimeout(function() { window.location.href = '/view.php'; }, 1000); 
                </script>";
               
               } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form </title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="wrapper">
        <div class="title"><span>Add form</span></div>        
        <form action="#" method="post">
            <div class="form-control">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullname" value="<?php if(isset($_POST['fullname'])) { echo htmlspecialchars($_POST['fullname']); } ?>">
                <span class="error"><?php if(isset($errors['fullname'])) { echo $errors['fullname']; } ?></span>
            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) { echo htmlspecialchars($_POST['email']); } ?>">
                <span class="error"><?php if(isset($errors['email'])) { echo $errors['email']; }  ?></span>
            </div>            
            <div class="form-control">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="<?php if(isset($_POST['age'])) { echo htmlspecialchars($_POST['age']); } ?>">
                <span class="error"><?php if(isset($errors['age'])) { echo $errors['age']; }  ?></span>
            </div>            
            
            <div class="form-control">
                <label for="dateOfBirth">dateOfBirth</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?php if(isset($_POST['dateOfBirth'])) { echo htmlspecialchars($_POST['dateOfBirth']); } ?>">
                <span class="error"><?php if(isset($errors['dateOfBirth'])) { echo $errors['dateOfBirth']; } ?></span>
            </div>          
            
            
            <button class="row button" type="submit">Submit</button>
        </form>       
    </div>
</body>
</html>