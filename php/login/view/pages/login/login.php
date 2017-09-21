<!DOCTYPE html>
<html>
<?php
	include('view/includes/head.php');
?>
<body>
<main class="row">
<header class="col-12 header row">

	<div class="col-3 col-d-3 col-m-6 header-item logo-container">
	<p style="font-size:30px;">﻿</p>
	</div>

	<div class="col-6 col-d-6 col-m-12 header-item middle-container">

	</div>

	<div class="col-3 col-d-3 col-m-6 header-item action-container">

	</div>
</header>

<section class="col-4 col-d-6 col-m-12 login">
	<article class="login-container">
		<header><p class="login-text">Admin panel</p></header>
		<main class="login-main">
			<form autocomplete="off">
				<input value="luuk" formdata type="text" name="username" placeholder="username">
				<input value="wachtwoord" formdata type="password" name="password" placeholder="password">
			</form>
		</main>
		<footer>
			<div id="error" class="error"></div>

			<a id="loginButton" class="login-button" href="javascript:;">Login</a>
		</footer>
	</article>
</section>
</main>

<script src="view/javascript/main.js" type="text/javascript"></script>
<script src="view/javascript/login.js" type="text/javascript"></script>
</body>
</html>
