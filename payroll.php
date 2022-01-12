<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}
?>

<html>]
    <head>
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
                <h1>Payroll Info</h1>
            </div>

            <?php
                if(isset($_GET['employeeID']))
                {
                    $selected_user = $_GET['employeeID'];
                    $user_last_name = "[user's last name]";
                    $basic_pay = "0.00";
                    $n_diff ="0.00";
                    $o_pay = "0.00";
                

                    include "dbs-connect.php";
                    $sql = "SELECT * FROM tblemployees";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        if($selected_user == $row['fldindex'])
                        {
                            $pay_period = 1;    //1 = monthly;  0.5 = semi-monthly
                            $type = 1;  //1 = full time;    0.5 = part-time
                            if ($row['fldemployeetype'] == 'Part')
                                $type = 0.5;

                            if ($row['fldperiod'] == 'Semi-Monthly')
                                $pay_period = 0.5;

                            $verify_ID = true;
                            $user_first_name = $row['fldfirstname'];
                            $user_last_name = $row['fldlastname'];
                            $basic_pay = ($row['fldBasicPay'] * $pay_period) * $type;

                            $hourly_rate = ($basic_pay * 12 / 52) / 55; //monthly to hourly = (base pay * 12 / 52 weeks) / 55 hours per week (which is an 8 hour work week)

                            $n_diff = ($row['fldNightDiff'] * $hourly_rate) * 125 / 100; //125% rate for night differential
                            $o_pay = ($row['fldOvertime'] * $hourly_rate) * 130 / 100;   //130% rate for ot pay

                            $gross_pay = $basic_pay + $n_diff + $o_pay;

                            //sss
                            if ($gross_pay >= 24750)
                                $sss = 1125;    //maximum sss contribution

                            else if ($gross_pay <= 1000)
                                $sss = 135;     //minimum sss contribution

                            else
                                $sss = 1125 * (($gross_pay / 24750) * 100) / 100;  //computation of the percentage of SSS contribution based on gross pay

                            //philhealth
                            if ($gross_pay >= 80000)
                                $philhealth= 1600;    //maximum philhealth contribution

                            else if ($gross_pay <= 10000)
                                $philhealth = 200;     //minimum philhealth contribution

                            else
                                $philhealth = 1600 * (($gross_pay / 80000) * 100) / 100;

                            //PAGIBIG
                            if ($gross_pay >= 7499)
                                $pagibig = 150;    //maximum pagibig contribution

                            else
                                $pagibig = $gross_pay * 1 / 100;

                            
                            $total_deductions = $sss + $philhealth + $pagibig;
                            $net_pay = $gross_pay - $total_deductions;
                        }
                    }
            }
            ?>

            <div class="payroll-table">
                <table>
                    <thead>
                    <tr>
                        <th> </th>
                        <th>Payroll for <?php echo $user_first_name. " " .$user_last_name; ?></th> 
                    </tr>
                    </thead>
                    <tr>
                        <td>Basic pay: </td>
                        <td><?php echo '₱' . number_format($basic_pay, 2); ?></td> 
                    </tr>
                    <tr>
                        <td>Night Differential: </td>
                        <td><?php echo '₱' . number_format($n_diff, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Overtime Pay: </td>
                        <td><?php echo '₱' . number_format($o_pay, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Gross Pay: </td>
                        <td><?php echo '₱' . number_format($gross_pay, 2);?></td>
                    </tr>
                    <tr>
                        <td>SSS Contribution: </td>
                        <td><?php echo '₱' . number_format($sss, 2); ?></td>
                    </tr>
                    <tr>
                        <td>PhilHealth Contribution: </td>
                        <td><?php echo '₱' . number_format($philhealth, 2); ?></td>
                    </tr>
                    <tr>
                        <td>PAG-IBIG Contribution: </td>
                        <td><?php echo '₱' . number_format($pagibig, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Total Deductions: </td>
                        <td><?php echo '₱' . number_format($total_deductions, 2); ?></td>
                    </tr>
                    <tr>
                        <td id = "netpay">Net Pay:</td>
                        <td id = "netpay"><?php echo '₱' . number_format($net_pay, 2); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <?php
            mysqli_close($con);
        ?>
    </body>
</html>