<?php
//session_destroy();
unset($_SESSION['sid']);
unset($_SESSION['cid']);
unset($_SESSION['exid']);
unset($_SESSION['yid']);
unset($_SESSION['seid']);
unset($_SESSION['shid']);
Redirect("?t=resultcheck");
?>