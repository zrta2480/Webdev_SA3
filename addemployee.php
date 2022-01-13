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
        <title>Add Employee</title>
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
                <h1>Employee / Add Employee</h1>
                <hr>
            </div>

            <div class="add-form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    Employee ID: <input type="text" name="employeeID" />
                    <br />
                    Last Name:   <input type="text" name="employeeLast" />
                    <br />
                    First Name:  <input type="text" name="employeeFirst" />
                    <br />
                    <br />
                    Job Position: 
                    <br />
                    Staff:     <input type="radio" name="employeePosition" value="Staff" />
                    <br />
                    Manager:   <input type="radio" name="employeePosition" value="Manager" />
                    <br />
                    Executive: <input type="radio" name="employeePosition" value="Executive" />
                    <br />
                    <br />
                    Employment Type:
                    <br />
                    Part-Time: <input type="radio" name="employeeType" value="Part" />
                    <br />
                    Full-Time: <input type="radio" name="employeeType" value="Full" />
                    <br />
                    <br />
                    Payment Period:
                    <br />
                    Monthly:      <input type="radio" name="employeePeriod" value="Monthly" />
                    <br />
                    Semi-Monthly: <input type="radio" name="employeePeriod" value="Semi-Monthly" />
                    <br />
                    Basic Pay: <input type="text" name="employeeBasicPay" />
                    <br />
                    Night Differential:   <input type="text" name="employeeNightDiff" />
                    <br />
                    Overtime Hours:  <input type="text" name="employeeOvertime" />
                    <br />
                    <br />
                    <input type="submit" name="submit_new_employee" value="Save" />
                </form>
                <a href="menu.php"><button>Cancel</button></a>
            </div>

            <?php
            include "dbs-connect.php";
            if(isset($_POST['submit_new_employee']))
            {
                
                $employee_ID = $_POST['employeeID'];
                $emplyee_last_name = $_POST['employeeLast'];
                $employee_first_name = $_POST['employeeFirst'];
                //$employee_password = $_POST['employeePassword'];
                //$employee_position = $_POST['employeePosition'];
                //$employee_type = $_POST['employeeType'];
                //$employee_period = $_POST['employeePeriod'];
                $employee_basic_pay = $_POST['employeeBasicPay'];
                $employee_night_diff = $_POST['employeeNightDiff'];
                $employee_overtime = $_POST['employeeOvertime'];

                //echo $employee_password . "<br />";
                //echo $employee_position . "<br />";
                //echo $employee_type . "<br />";
                //echo $employee_period . "<br />";

                if(empty($employee_ID) || empty($emplyee_last_name) || empty($employee_first_name) || empty($_POST['employeePosition']) || empty($_POST['employeeType']) || empty($_POST['employeePeriod']) || !is_numeric($employee_basic_pay) || !is_numeric($employee_night_diff) || !is_numeric($employee_overtime))
                {
                    echo "Please fill in all the required information!!! <br />";
                    //echo $employee_position;
                }
                else {
                    $employee_position = $_POST['employeePosition'];
                    $employee_type = $_POST['employeeType'];
                    $employee_period = $_POST['employeePeriod'];

                    $sql = "SELECT * FROM tblemployees";
                    $result = mysqli_query($con, $sql);
                    $verify_ID = false;
                    while($row = mysqli_fetch_array($result))
                    {
                        if($employee_ID == $row['fldindex'])
                        {
                            $verify_ID = true;
                        }
                    }

                    if($verify_ID)
                    {
                        echo "<h3>Duplicate Employee ID is NOT allowed!!!</h3>";
                        echo "<br />";
                    }
                    else {
                        $enter_sql = "INSERT INTO tblemployees (fldindex, fldlastname, fldfirstname, fldposition, fldemployeetype, fldperiod, fldBasicPay, fldNightDiff, fldOvertime)
                        VALUES('$employee_ID', '$emplyee_last_name', '$employee_first_name', '$employee_position', '$employee_type', '$employee_period', '$employee_basic_pay', '$employee_night_diff', '$employee_overtime')";
                        $check = mysqli_query($con, $enter_sql);
                        if(!$check)
                        {
                            die("Error: " . mysqli_error($con));
                        }
                        else {
                        echo "<h3>Record Saved!!!</h3>";
                        }
                        echo "</br >";
                        echo "<a href='menu.php'><button>Go Back</button></a>";
                    }
                }
            }
            mysqli_close($con);
            ?>


        </div>
    </body>
</html>