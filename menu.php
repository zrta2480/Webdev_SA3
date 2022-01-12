<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
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
            <div class="search-add">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="searchKey" required/>
                    <input type="submit" value="Search Employee" name="enterSearch" />
                    <input type="submit" value="Add Employee" name="addEmployee" onclick="action='addemployee.php'; return true;" formnovalidate/>
                </form>
            </div>
            <?php
            include "display.php";
            ?>
            <div class="displayButton">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="submit" value="Display All" name="displayAll" />
                </form>
            </div>


        </div>
    </body>

</html>