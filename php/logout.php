<?php
session_start();

session_unset();
header('Location: ../loginsignup.php');