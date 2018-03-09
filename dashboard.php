<?php

	require_once 'core/init.php';
	
	$user = new User();
	
	if(!$user->check()) {
		Redirect::to('login');
	} 
	
	Helper::getHeader('Algebra Auth | Dashboard', 'main-header');
	

	require_once 'notifications.php';
	//Redirect::to(404);
?>
    <div class="row">
		<div class="col-xs-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
			<h1>Welcome to dashboard!</h1>
		<a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
		</div>
	</div>
<?php
	Helper::getFooter('main-footer');
?>