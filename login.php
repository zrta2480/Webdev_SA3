<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <div class="login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                Employee Number: <input type="text" name="idNumber" />
                Password: <input type="text" name="userPassword" />
                <input type="submit" value="Enter" name="submitCredentials" />
            </form>
        </div>
    </body>
</html>

<?php
include "dbs-connect.php";

if(isset($_POST['submitCredentials']))
{
    $submitted_id = $_POST['idNumber'];
    $submitted_pass = $_POST['userPassword'];

    $login_sql = "SELECT * FROM tlbemployees";

    $login_result = mysqli_query($con, $login_sql);

    $confirm = false;

    //echo $submitted_id . "<br />";
    //echo $submitted_pass . "<br />";
    
}

?>
