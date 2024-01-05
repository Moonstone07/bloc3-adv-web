<?php
if (!isset($_GET['controller']) || $_GET['controller'] == 'home') {
    include('views/welcome.php');
} elseif ($_GET['controller'] == 'login') {
    include('views/login.php');
} elseif ($_GET['controller'] == 'dashboard') {
    include('views/dashboard.php');
} elseif ($_GET['controller'] == 'logout') {
    include('views/logout.php');
} else {
    include('views/404.php');
}

class Controller
{
}
