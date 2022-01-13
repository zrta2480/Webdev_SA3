<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}
?>
<html>
    <head>
        <title>Delete Employee</title>
        <link rel="stylesheet" href="sa3-stylesheet.css">
    </head>

    <body>
        <header class="header" role="banner">
          <h1 class="logo">
            <a href="#">Payroll <span>Calculator</span></a>
          </h1>
          <div class="nav-wrap">
            <nav class="main-nav" role="navigation">
              <ul class="unstyled list-hover-slide">
                <li><a href="menu.php">Menu</a></li>
                <li><a href="login.php">Logout</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </nav>
            <ul class="social-links list-inline unstyled list-hover-slide">
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Google+</a></li>
              <li><a href="https://github.com/zrta2480/Webdev_SA3">GitHub</a></li>
              <li><a href="#">CodePen</a></li>
            </ul>
          </div>
        </header>

        <div class="main-body">
            <div class="main-header">
                <hr>
                <h1>Employee / Delete Employee</h1>
                <hr>
            </div>

            <div class="delete-form">   
                <?php
                include "dbs-connect.php";
                echo "</br >";
                echo "</br >";

                if(isset($_GET['employeeID']))
                {
                    $old_last = "[your last name]";
                    $old_first = "[your first name]";
                    $old_position = "[your employee position]";
                    $old_type = "[your employee type]";
                    $submitted_ID = $_GET['employeeID'];
                    $sql = "SELECT * FROM tblemployees";
                    $result = mysqli_query($con, $sql);
                    $verify_ID = false;

                    while($row = mysqli_fetch_array($result))
                    {
                        if($submitted_ID == $row['fldindex'])
                        {
                            $verify_ID = true;
                            $old_last = $row['fldlastname'];
                            $old_first = $row['fldfirstname'];
                            $old_position = $row['fldposition'];
                            $old_type = $row['fldemployeetype']; 
                        }
                    }

                    if($verify_ID)
                    {
                        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                        echo "Employee ID: <input type='text' value='". $submitted_ID ."' readonly><br />";
                        echo "Last Name: <input type='text' value='" . $old_last . "' readonly><br />";
                        echo "First Name: <input type='text' value='" . $old_first . "' readonly><br />";
                        echo "Job Position: <input type='text' value='" . $old_position . "' readonly><br />";
                        echo "Employee Type: <input type='text' value='" . $old_type . "' readonly><br />";
                        echo "<hr>";
                        echo "<input type='hidden' name='selectedEmployeeID' value='" . $submitted_ID . "' />";
                        echo "<input type='submit' name='submit_delete_employee' value='Delete Employee' />";
                        echo "</form>";
                        echo "<a href='menu.php'><button>Cancel</button></a>";
                    }
                    else {
                        echo "Please enter a valid student number!";
                        echo "<br />";
                        echo "<a href='menu.php'><button>Go Back</button></a>";
                    }
                }
                elseif(isset($_POST['submit_delete_employee']))
                {
                    $identifier = $_POST['selectedEmployeeID'];
                    $deletion_sql = "DELETE FROM tblemployees WHERE fldindex='$identifier'";
                    if($con->query($deletion_sql) == TRUE)
                    {
                        echo "<h3>Record Deleted!!!</h3>" . "<br />";
                        echo "<a href='menu.php'><button>Go Back</button></a>";
                    }
                    else
                    {
                        echo "Error deleting: " . $con->error;
                        echo "<a href='menu.php'><button>Go Back</button></a>";
                    }
                }
                else
                {
                    echo "Please enter a valid employee ID!";
                    echo "<br />";
                    echo "<a href='menu.php'><button>Go Back</button></a>";
                }

                mysqli_close($con);
                ?>
            </div>

        </div>
    </body>
</html>