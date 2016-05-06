<?php
include("functions.php");
session_start();
$connect = false;
$emailDuplicatedError = NULL;
$passwordsDifferentError = NULL;
$disconnectMsg = NULL;

include("boilerplate.php");

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
			$passwordsDifferentError = 'Warning : Passwords do not match.';
		} else {
			$pwd_hash = pwd_hash($_POST['pwd1']);
			register($name, $firstname, $pseudo, $email, $street, $zip_code, $city, $country, $pwd_hash);
			$_SESSION['connect'] = true;
			$connect = true;
			$_SESSION['email'] = $_POST['email'];
		}
} elseif (isset($_SESSION['connect'])) {
	$disconnectMsg = "You have been disconnected.";
	session_destroy();
}	
	
if ($connect) {
	include("navbar_connected.php");
	?>
	<div class='container'>
		<div class='alert alert-info  col-sm-9 col-sm-offset-2' role=alert>Your account has been successfully created.</div>";
	</div>
<?php
} else {
	include("navbar_unconnected.php");	
	?>	
	<div class="container">
		<?php
		if (isset($disconnectMsg))
			echo "<div class='alert alert-info  col-sm-9 col-sm-offset-2' role=alert>".$disconnectMsg."</div>";
		?>
		<form class="form-horizontal" action="register.php" method='post'>
			<!-- Name -->		
			<div class="form-group">
				<label for="name" class="control-label col-sm-2">Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="name" required title="This field is required" placeholder="Enter your name"
						<?php
							if (isset($edit)) echo "value=\"$name\"";
						?>
					>
				</div>
			</div>
				
			<!-- First Name -->
			<div class="form-group">
				<label for="firstname" class="control-label col-sm-2">First Name</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="firstname" required title="This field is required" placeholder="Enter your firstname"
						<?php
							if (isset($edit)) echo "value=\"$firstname\"";
						?>
					>
				</div>
			</div>
		
			<!-- Pseudo -->
			<div class="form-group">
				<label for="pseudo" class="control-label col-sm-2">Pseudo</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="pseudo" required pattern="[a-zA-Z0-9]{2,}" title="Valid pseudo contains at least 2 characters or numbers" placeholder="Valid pseudo contains at least 2 characters or numbers"
						<?php
						if (isset($edit)) echo "value=\"$pseudo\"";
						?>
					>
				</div>
			</div>
			
			<!-- Email -->		
			<div class="form-group">
				<?php
					if (isset($emailDuplicatedError)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>$emailDuplicatedError</div>";
				?>
				<label for="email" class="control-label col-sm-2">Email</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" name="email" required pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}" title="Please enter a valid email address" placeholder="Please enter a valid email address"
						<?php
						if (isset($edit)) echo "value=\"$email\"";
						?>
					>
				</div>
			</div>

			<!-- Street -->				
			<div class=form-group>					
				<label for="Adresse" class="control-label col-sm-2">Address</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="street" required placeholder="Enter street number and name"
						<?php
							if (isset($edit)) echo "value=\"$street\"";
						?>
					>
				</div>
			</div>
			
			<!-- City and ZIP Code -->
			<div class=form-group>	
				<label for="City" class="control-label col-sm-2">City</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" name="zip_code" required placeholder="ZIP code"
						<?php
							if (isset($edit)) echo "value=$zip_code";
						?>
					>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="city" required placeholder="City"
						<?php
							if (isset($edit)) echo "value=\"$city\"";
						?>
					>
				</div>
			</div>
			
			<!-- Country -->
			<div class=form-group>
				<label for="country" class="control-label col-sm-2">Country</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="country" required placeholder="Country"
						<?php
							if (isset($edit)) echo "value=\"$country\"";
						?>
					>
				</div>
			</div>
		
			<!-- Password -->
			<div class="form-group">
				<?php
					if (isset($passwordsDifferentError)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>$passwordsDifferentError</div>";
				?>	
				<label for="first_name" class="control-label col-sm-2">Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="pwd1" pattern=".{6,}" placeholder="Valid password must be of 6 characters minimum" required title="Valid password must be of 6 characters minimum">
				</div>
			</div>
			
			<!-- Confirm Password-->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-9">
					<input type="password" class="form-control" name="pwd2" pattern=".{6,}" placeholder="Confirm password" required title="Valid password must be of 6 characters minimum">
				</div>
			</div>
					
			<!-- Submit -->		
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" formaction='register.php' class="btn btn-default">Sign in</button>
				</div>
			</div>
			
			<!-- Hidden -->
			<div class="form-group">
				<input type="hidden" class="form-control" name="edit">
			</div>
			
		</form>
	</div>
	<?php
	}
	?>
</body>
</html>
	
