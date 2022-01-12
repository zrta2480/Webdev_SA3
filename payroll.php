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
                $selected_user = $_GET['employeeID'];
            ?>

            <div class="payroll-table">
                <table>
                    <tr>
                        <th> </th>
                        <th>Payroll for (employee name here)</th> 
                    </tr>
                    <tr>
                        <td>Basic pay: </td>
                        <td></td> 
                    </tr>
                    <tr>
                        <td>Taxable Allowance: </td>
                        <td></td> 
                    </tr>
                    <tr>
                        <td>Non-Taxable Allowance: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Night Differential: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Overtime Pay: </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Gross Pay: </td>
                        <td> </td>
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
    </body>
</html>