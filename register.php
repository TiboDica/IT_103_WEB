<?php
include("functions.php");
session_start();
$connect = false;
$emailDuplicatedError = NULL;
$passwordsDifferentError = NULL;
		
if (isset($_POST['edit'])) {
	$name = $_POST['name'];
	$firstname = $_POST['firstname'];
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$street = $_POST['street'];
	$zip_code = $_POST['zip_code'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$edit = $_POST['edit'];
	
	if (isAlreadyRegistered($email)) {
		$emailDuplicatedError = 'Warning : An account already exists whith this email address.';
	} else if ($_POST['pwd1'] != $_POST['pwd2']) {
		$emailDuplicatedError = NULL;
		$passwordsDifferentError = 'Warning : The two passwords are not identical.';
	} else {
		$pwd_hash = pwd_hash($_POST['pwd1']);
		register($name, $firstname, $pseudo, $email, $street, $zip_code, $city, $country, $pwd_hash);
		$_SESSION['connect'] = true;
		$connect = true;
		$_SESSION['email'] = $_POST['email'];
	}
}

include("boilerplate.php");
	if ($connect) {
		include("navbar_connected.php");
	} else {
		include("navbar_unconnected.php");		
	} 
?>	
	<div class="container">
		<form class="form-horizontal" action="register.php" method='post'>
			<div class="form-group">
				<!------- Name ------->
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="name" required title="This field is required" placeholder="Enter your name"
					<?php
						if (isset($edit)) echo "value=$name>";
					?>
				</div>
			</div>
			
			<div class="form-group">
				<!------- First Name ------->
				<label for="firstname" class="col-sm-2 control-label">First Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="firstname" required title="This field is required" placeholder="Enter your firstname"
					<?php
						if (isset($edit)) echo "value=$firstname>";
					?>
				</div>
			</div>			

			<div class="form-group">
				<!------- Pseudo ------->
				<label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="pseudo" required pattern="[a-zA-Z0-9]{2,}" title="Valid pseudo contains at least 2 characters or numbers" placeholder="Valid pseudo contains at least 2 characters or numbers"
					<?php
						if (isset($edit)) echo "value=$pseudo>";
					?>
				</div>
			</div>			
			
			<div class="form-group">
				<!------- Email ------->
				<label for="email" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" name="email" required pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}" title="Please enter a valid email address" placeholder="Please enter a valid email address"
					<?php
						if (isset($edit)) echo "value=$email>";
					?>
				</div>
				<br>
				<div> 
					<?php
						if (isset($emailDuplicatedError)) echo "<span>$emailDuplicatedError</span>";
					?>
				</div>
			</div>	
			
			<br>
			<!-------- Address -------->
			<div>
				<!------- Street ------->
				<div class="form-group">
					<label for="street" class="col-sm-2 control-label">Address</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="street" required placeholder="Enter street numer and name"
						<?php
							if (isset($edit)) echo "value=$street>";
						?>
					</div>
				</div>
				
				<!------- ZIP Code and City ------->
				<div class="form-group">
					<div class="col-sm-9">
						<input type="number" class="form-control" name="zip_code" required placeholder="ZIP code"
						<?php
							if (isset($edit)) echo "value=$zip_code>";
						?>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="city" required placeholder="City"
						<?php
							if (isset($edit)) echo "value=$city>";
						?>
					</div>
				</div>
				
				<!------- Country ------->
				<div class="form-group">
					<div class="col-sm-9">
						<input type="text" class="form-control" name="country" required placeholder="Country"
						<?php
							if (isset($edit)) echo "value=$country>";
						?>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<!------- Password ------->
				<label for="first_name" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="pwd1" required title="This field is required"> <!---- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"---->
				</div>
			</div>

			<div class="form-group">
				<!------- Password (confirm) ------->
				<label for="first_name" class="col-sm-2 control-label">(confirm) Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="pwd2" required title="This field is required">
				</div>
			</div>
			<?php
				if (isset($passwordsDifferentError)) echo "<label>$passwordsDifferentError</label>";
			?>
			
			<div class="form-group">
					<input type="hidden" class="form-control" name="edit">
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" formaction='register.php' class="btn btn-default">Sign in</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
