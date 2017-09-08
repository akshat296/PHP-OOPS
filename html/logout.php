<html>
<title>log out</title>
<body>
<?php

session_start();
unset($_SESSION['username']);

?>
<p> You have been successfully logged out.</p>
</body>
</html>