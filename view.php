<?php
$db_host = "localhost";
    $db_name = "gkb";
    $db_user = "root";
    $db_pass = "";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();     
    }
    $sql = "SELECT * FROM users ";
    $result=mysqli_query($conn,$sql);
    if($result===false) {
        echo myspli_error($conn);
    } else {
        $user_data=mysqli_fetch_assoc($result);
    }
    ?>
 <table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Date of Birth</th>
            </tr>
            <?php while($user_data=mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td> <?php  echo $user_data['id']; ?></td>
                <td> <?php  echo $user_data['fullname']; ?></td>
                <td> <?php  echo $user_data['email']; ?> </td>
                <td><?php  echo $user_data['age']; ?></td>
                <td><?php  echo $user_data['dateOfBirth']; ?></td>
            </tr>
        <?php } ?>
</table>

