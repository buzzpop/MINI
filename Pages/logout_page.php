<?php
session_start();
session_destroy();
header("Location: player_login_page.php");
exit;