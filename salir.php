<?php
     session_start();
     session_destroy();
     header("Location:index.php");
?>
<html>
<body>
    
    <h2>Sesion Cerrada</h2>
    
</body>
</html>