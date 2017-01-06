<?php
session_start ();
$username = $_SESSION ['username'];
unset ( $_SESSION ['username'] );
echo 'Logout . . . . . . ';
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
?>