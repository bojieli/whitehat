<?php
session_start();
if (!(isset($_POST["captcha"]) && ($_POST["captcha"] == $_SESSION["code"]))) {
	echo '0';
	session_destroy();
} else {
	echo '1';
}