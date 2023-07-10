<?php

    if($_COOKIE['migalleta']){
        unset($_COOKIE['migalleta']);
        setcookie('migalleta', '', time()-100);
    }
    header('Location:ver_cokkies.php');
?>
