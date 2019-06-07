<?php
$err = '';
if(isset($_POST['submit'])){
    if (empty($_POST['fname'])){
        $err = "You have enter name!";
    }elseif (empty($_POST['lname'])){
        $err = "You have enter name!";
    }elseif (empty($_POST['email'])){
        $err = "You have enter email!";
    }elseif (empty($_POST['pwd'])){
        $err = "You have enter password!";
    }else{

       if( $link = mysqli_connect('localhost','root','','users')){

           $fname = strtolower(trim($_POST['fname']));
           $lname = strtolower(trim($_POST['lname']));
           $email = strtolower(trim($_POST['email']));
           $pwd = trim($_POST['pwd']);

           $sql = "SELECT * FROM sign_user WHERE 'email' = '$email'";
           $result = mysqli_query($link,$sql);
           if($result && mysqli_num_rows($result)>0){
               $err = 'This email exsist';
           }else{
               $link = mysqli_connect('localhost','root','','users');
               $sql = "INSERT INTO sign_user VALUES ('','$fname','$lname','$email','$pwd',2,0)";
               $result = mysqli_query($link,$sql);
               if($result && mysqli_affected_rows($link)>0){
                   session_start();
                   $_SESSION['ms'] = " Welcome $lname";
                   header('location: sign_in.php');
               }else{
                        $err = 'Error conect DB';
               }
           }
       }



    }
}



?>

<html>
<body>

<form action="index.php" method="post">
    First Name: <input type="text" name="fname" placeholder="name"><br>
    Last Name: <input type="text" name="lname" placeholder="last name"><br>
    E-mail: <input type="text" name="email" placeholder="email"><br>
    Password: <input type="text" name="pwd" placeholder="password"><br>
    <input type="submit" name="submit"><br>
    <span style="color: blue"><?=$err?></span>
</form>

</body>
</html>
