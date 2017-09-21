<!DOCTYPE html>
<html>
<?php
	include('view/includes/head.php');
?>
<body>

<main class="row">
	<?php
		include('view/includes/header.php');
		include('view/includes/sidebar.php');
	?>

	<section class="col-10 col-d-12 col-m-12 content">
		<div class="user_header"><h2>User information</h2><a href="/dashboard/users/create">Create user</a></div>
		<?php echo $users; ?>

	</section>
</main>

<script src="/view/javascript/main.js" type="text/javascript"></script>
<script src="/view/javascript/dashboard.js" type="text/javascript"></script>
</body>
</html>