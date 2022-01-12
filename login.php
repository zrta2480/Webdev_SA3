<?php
session_start();
unset($_SESSION['user']);
?>
<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <div class="login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                Admin Name: <input type="text" name="idNumber" />
                Password: <input type="password" name="userPassword" />
                <input type="submit" value="Enter" name="submitCredentials" />
            </form>
        </div>
    </body>
</html>

<?php
    include "dbs-connect.php";

    if (isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    if(isset($_POST['submitCredentials']))
    {
        $adminName = "admin";
        $adminPass = "password";

        $submitted_id = $_POST['idNumber'];
        $submitted_pass = $_POST['userPassword'];

        //$login_sql = "SELECT * FROM tblemployees WHERE (`fldindex` LIKE '%$submitted_id%') AND (`fldpassword` LIKE '%$submitted_pass%')";

        //$login_result = mysqli_query($con, $login_sql);

        
        //echo $submitted_id . "<br />";
        //echo $submitted_pass . "<br />";
        $_SESSION['user'] = $submitted_id;

        if ($adminName == $submitted_id AND $adminPass == $submitted_pass)
        {
            header("Location: menu.php");
            exit();
        }

        else {
            unset($_SESSION['user']);
            $_SESSION['message'] = 'Wrong username or password!';
            header("Location: login.php");
            exit();
        }   
    }
    mysqli_close($con);
?>
