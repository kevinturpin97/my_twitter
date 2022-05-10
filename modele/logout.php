<?php

include "user.php";
session_start();
session_destroy();

return header("Location: http://localhost:8000/index.php");
