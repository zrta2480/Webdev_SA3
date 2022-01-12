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
        <div class="side-bar">
            <table>
                <tr>
                    <td><a href="menu.php">Menu</a></td>
                </tr>
                <tr>
                    <td><a href="login.php">Logout</a></td>
                </tr>
            </table>
        </div>

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
                    $tax_allowance = "0.00";
                    $non_tax = "0.00";
                    $n_diff ="0.00";
                    $o_pay = "0.00";
                

                    include "dbs-connect.php";
                    $sql = "SELECT * FROM tblemployees";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        if($selected_user == $row['fldindex'])
                        {
                            $verify_ID = true;
                            $user_first_name = $row['fldfirstname'];
                            $user_last_name = $row['fldlastname'];
                            $basic_pay = $row['fldBasicPay'];

                            $hourly_rate = ($basic_pay * 12 / 52) / 55; //monthly to hourly = (base pay * 12 / 52 weeks) / 55 hours per week (which is an 8 hour work week)

                            $tax_allowance = $row['fldTaxAllow'];
                            $non_tax = $row['fldNonTaxAllow'];
                            $n_diff = ($row['fldNightDiff'] * $hourly_rate) * 125 / 100; //125% rate for night differential
                            $o_pay = ($row['fldOvertime'] * $hourly_rate) * 130 / 100;   //130% rate for ot pay

                            $gross_pay = $basic_pay + $n_diff + $o_pay;
                        }
                   
                    }
            }
            ?>

            <div class="payroll-table">
                <table>
                    <tr>
                        <th> </th>
                        <th>Payroll for <?php echo $user_first_name. " " .$user_last_name; ?></th> 
                    </tr>
                    <tr>
                        <td>Basic pay: </td>
                        <td><?php echo '₱' . number_format($basic_pay, 2); ?></td> 
                    </tr>
                    <tr>
                        <td>Taxable Allowance: </td>
                        <td><?php echo '₱' . number_format($tax_allowance, 2); ?></td> 
                    </tr>
                    <tr>
                        <td>Non-Taxable Allowance: </td>
                        <td><?php echo '₱' . number_format($non_tax, 2); ?></td>
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
                        <td><?php echo '₱' . number_format($gross_pay, 2); //tax and non tax allowance not accounted for, going to be removed soon?></td>
                    </tr>
                    <tr>
                        <td>Withholding Tax: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>SSS Contribution: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>PhilHealth Contribution: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>PAG-IBIG Contribution: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Total Deductions: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Net Pay: </td>
                        <td> </td>
                    </tr>
                </table>
            </div>
        </div>

        <?php
            mysqli_close($con);
        ?>
    </body>
</html>