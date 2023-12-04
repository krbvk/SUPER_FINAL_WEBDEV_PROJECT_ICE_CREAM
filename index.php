<?php
function require_multi($files) {
    $files = func_get_args();
    foreach($files as $file)
        require_once($file);
}
require_multi("includes/navbar.php","pages/home.php","includes/footer.php",);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier De Natsu</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon-16x16.png" type="image/png">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon" sizes="16x16">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon" sizes="32x32">
</head>
</html>