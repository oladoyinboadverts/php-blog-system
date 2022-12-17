<?php

include"auth/blade.auth.php";


session_destroy();
session_unset();

exit(header("Location: login.auth.php"));


?>