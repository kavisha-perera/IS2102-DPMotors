<?php

session_start();
session_unset();
session_destroy();

header("location: ../UI/Auth-UI/index.php");

exit();

