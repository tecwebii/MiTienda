<?php
ob_start();
session_start();
session_destroy();
header("Location: ../");
ob_end_flush();
?>