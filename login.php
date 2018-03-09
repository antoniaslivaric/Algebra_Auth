<?php

	require_once 'core/init.php';
	
	$user = new User();
	
	if($user->check()) {
		Redirect::to('dashboard');
	} 
	
	Helper::getHeader('Algebra Auth | Sign In', 'main-header');
	
	$validate = new Validation();
	
	if(Input::exists()){
			if(Token::check(Input::get('token'))){
			$validation = $validate->check(array(
				'username'	=> array(
					'required' => true
				),
				'password'	=> array(
					'required' => true
				)
			));
			/*echo '<pre>';
			var_dump($validation);
			echo '</pre>';*/
			
			if($validation->getPassed()) {
				
				$login = $user->login(Input::get('username'), Input::get('password'));
				
				if($login) {
					Redirect::to('dashboard');
				}
				
				Session::flash('danger','Login failed!');
				Redirect::to('login');
				
			}
		}
	}
	
	require_once 'notifications.php';
	//Redirect::to(404);
?>
    <div class="row">
		<div class="col-xs-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Sign In</h3>
				</div>
				<div class="panel-body">
					<form method="post">
					<input type="hidden" name="token" value="<?php echo Token::generate() ?>">
							<label for="username">Username*</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
							<?php echo ($validate->hasError('username')) ? '<p class="text-danger">'.$validate->hasError('username').'</p>' : '' ?>
				
							<div class="form-group <?php echo ($validate->hasError('password')) ? '' : '' ?>">
								<label for="password">Password*</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<?php echo ($validate->hasError('password')) ? '<p class="text-danger">'.$validate->hasError('password').'</p>' : '' ?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Sign In</button>
							<p>If you don't have an account, please <a href="register.php">Register</a></p>
							</div>
					</form>
					</div>
				</div>
			</div>
		</div>
<?php
	Helper::getFooter('main-footer');
?>