<?php
//session_destroy();
unset($_SESSION['cid']);
unset($_SESSION['yid']);
unset($_SESSION['seid']);
unset($_SESSION['shid']);
Redirect("?t=attendencecheck");
?>