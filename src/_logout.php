<?php
    session_unset();
    echo '<script>window.location.href = \'?page=login&loggedOut=true\';</script>';
?>