<?php include_once("header.php"); ?>
<body>
	<form name="register" id="register" method="post" action="">
		<section class="container">
		<div class="login">
			<label for="username">Username:</label>
				<input type="text" tabindex="1" class="input" id="username" name="username" value=""/>
			<label for="email">Email:</label>
				<input type="text" tabindex="2" class="input" id="email" name="email" value=""/>
			<label for="password">Password</label>
				<input type="password" tabindex="3" class="input" id="password" name="password" value=""/>
			<label for="confirm_password">Confirm Password</label>
				<input type="password" tabindex="4" class="input" id="confirm_password" name="confirm_password" value=""/>
				<input type="submit" tabindex="5" id="submit" class="submit" value="submit" name="submit" />
		</div>
		</section>
	</form>
</body>
</html>