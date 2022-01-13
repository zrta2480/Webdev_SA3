About the Project:

The project is a payroll system for employees which log, display, and compute the necessary information for the pay of the employees.
It displays employee information and gives options for adding, editing and deleting employees as well as searching for specific ones.
It gives an option to generate the payroll of a specific selected employee.
The program will initially display the login menu, then after validating the login, the user is redirected to the main display screen containing the employee info and options.
It also has a sidebar with the menu and logout directory.

Login Menu
    The login menu is a standard sign in screen that will prompt for a username/ admin name and a password. It verifies if the user input matches that of the recorded data for the admin which if correct, will grant the user access to the main menu display.

Employees Tab Display Menu (Main menu)
    The employees tab display is the main menu display of the payroll system program. It displays the employee info from the Mysql database for the program. It shows the employee’s name, id number, position, etc. There is a search bar at the top of the employee table which allows the user to search for certain employees within the criteria given. Along the table, there are also options to add, edit, or delete employees as well as a payroll link.

Add/Edit/Delete Employees
    Similar to the previous assessments, the employee table has these functions to add another employee, edit their details, or delete them from the database. Each of the options, once selected, will redirect the user to their specific displays, each of which have a cancel button to prevent any of the operations from being executed. 

Payroll Generation
    This feature on the employee table allows a specific employee to have their pay be calculated. The link in the table, once clicked, will take the user to the corresponding page for displaying the details of the pay computation for a specific employee. Details such as position, net pays, gross pay, tax deductions and certain contributions are shown to give detail to the computation of the pay. It also displays the type of salary the employee receives (monthly, semi-monthly, etc.).

Login Form
    The main login method for users of the payroll system, mainly serves to authenticate and verify the user to be entering the payroll system

Search Form
    Mainly used to search for specific employees in the main display menu. It can be used with a wide criteria from some of the employee details such as searching using the name, employee id, position, and even with the employee type.

Add Form
    Form for filling out details of a new employee to be added into the system and database.
    
Edit Form
    Form for editing and updating employee details into the employee database.

Delete Form
Form for entirely removing an employee from the database and effectively, from the payroll system.

Database, tables, and fields used to hold data
    The system uses a database named “dbpayroll” which contains 1 table for the payroll system employees named “tblemployees”. 

Reports generated by the project
    The program generates a payroll report for a specific employee through the payroll option link from the employee table display on the main menu. It includes the aforementioned details from the payroll generation feature. The payroll display has an option for it to generate a pdf file containing the the payroll report.
