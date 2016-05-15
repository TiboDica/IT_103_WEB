<?php
require("functions.php");
session_start();
$ErrorEmailDuplicate = NULL;
$ErrorEmailInvalid = NULL;
$ErrorPseudoDuplicate = NULL;
$ErrorPseudoInvalid = NULL;
$ErrorPwdDifferents = NULL;
$ErrorPwdLength = NULL;
$disconnectMsg = NULL;
if (isset($_POST['change']) && isset($_SESSION['email'])) {
	$change = $_POST['change'];
	$user = user($_SESSION['email']);
	$name = $user['name'];
	$firstname = $user['firstname'];
	$pseudo = $user['pseudo'];
	$email = $user['email'];	
	$street = $user['street'];
	$zip_code = $user['zip_code'];
	$city = $user['city'];
	$country = $user['country'];
	if (isset($_POST['edit'])) {
		$street = $_POST['street'];
		$zip_code = $_POST['zip_code'];
		$city = $_POST['city'];
		$country = $_POST['country'];
		$edit = $_POST['edit'];
		if (auth($email, $_POST['pwd1'])) {
			userUpdate($pseudo, $_POST['street'], $_POST['zip_code'], $_POST['city'], $_POST['country']);
			$updateMsg = 'Your informations have been updated.';
		} else {
			$ErrorPwdIncorrect = 'Password incorrect, please try again.';
		}
	} else {
			$street = $user['street'];
			$zip_code = $user['zip_code'];
			$city = $user['city'];
		$country = $user['country'];
	}
} elseif (isset($_POST['edit'])) {
	$name = $_POST['name'];
	$firstname = $_POST['firstname'];
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$street = $_POST['street'];
	$zip_code = $_POST['zip_code'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$edit = $_POST['edit'];
	if (!preg_match('#[a-zA-Z0-9]{2,}#', $pseudo))
		$ErrorPseudoInvalid = 'Valid Pseudo contains at least 2 characters or numbers.';
	if (pseudoIsTaken($pseudo))
		$ErrorPseudoDuplicate = 'Warning : This pseudo is already taken.';
	if (!preg_match('#[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}#', $email))
		$ErrorEmailInvalid = 'Please a valid email address.';
	if (isAlreadyRegistered($email))
		$ErrorEmailDuplicate = 'Warning : An account already exists whith this email address.';
	if ($_POST['pwd1'] != $_POST['pwd2'])
		$ErrorPwdDifferents = 'Warning : Passwords do not match.'; 
	if (strlen($_POST['pwd1']) < 6)
		$ErrorPwdLength = 'Valid password contains at least 6 characters.';
	
	if (!(isset($ErrorPseudoInvalid) or isset($ErrorPseudoDuplicate) or isset($ErrorEmailInvalid) or isset($ErrorEmailDuplicate) or isset($ErrorPwdDifferents) or isset($ErrorPwdLength))) {
		$pwd_hash = pwd_hash($_POST['pwd1']);
		register($name, $firstname, $pseudo, $email, $street, $zip_code, $city, $country, $pwd_hash);
		header('Location: sign_in.php?registered');
		exit();
	}
} elseif (isset($_SESSION['connect'])) {
	$disconnectMsg = "You have been disconnected.";
	session_destroy();
}	
	
require("boilerplate.php");
if (isset($_SESSION['connect'])) {
	require("navbar_connected.php");	
} else {
	require("navbar_unconnected.php");
}
?>	
<div class="container">
	<?php
	if (isset($disconnectMsg)) echo "<div class='alert alert-info  col-sm-9 col-sm-offset-2' role=alert>".$disconnectMsg."</div>"; 
	if (isset($updateMsg)) echo "<div class='alert alert-success  col-sm-9 col-sm-offset-2' role=alert>".$updateMsg."</div>";
	?>
	<form class="form-horizontal" action="register.php" method='post'>
		<!-- Name -->		
		<div class="form-group">
			<label for="name" class="control-label col-sm-2">Name</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="name" required title="This field is required" placeholder="Enter your name"
					<?php 
						if (isset($edit)) echo "value=\"$name\"";
						if (isset($change)) echo "value=\"$name\" disabled";
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
						if (isset($change)) echo "value=\"$firstname\" disabled"; 
						?>
				>
			</div>
		</div>
	
		<!-- Pseudo -->
		<div class="form-group">
			<?php
				if (isset($ErrorPseudoDuplicate)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$ErrorPseudoDuplicate."</div>";
				if (isset($ErrorPseudoInvalid)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$ErrorPseudoInvalid."</div>";
			?>
			<label for="pseudo" class="control-label col-sm-2">Pseudo</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="pseudo" required pattern="[a-zA-Z0-9]{2,}" title="Valid pseudo contains at least 2 characters or numbers" placeholder="Valid pseudo contains at least 2 characters or numbers"
					<?php
					if (isset($edit)) echo "value=\"$pseudo\"";
					if (isset($change)) echo "value=\"$pseudo\" disabled";
					?>
				>
			</div>
		</div>
		
		<!-- Email -->		
		<div class="form-group">
			<?php
				if (isset($ErrorEmailDuplicate)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$ErrorEmailDuplicate."</div>";
				if (isset($ErrorEmailInvalid)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$ErrorEmailInvalid."</div>";
			?>
			<label for="email" class="control-label col-sm-2">Email</label>
			<div class="col-sm-9">
				<input type="email" class="form-control" name="email" required pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}" title="Please enter a valid email address" placeholder="Please enter a valid email address"
					<?php
					if (isset($edit)) echo "value=\"$email\"";
					if (isset($change)) echo "value=\"$email\" disabled";
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
						if (isset($edit) or isset($change)) echo "value=\"$street\"";
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
						if (isset($edit) or isset($change)) echo "value=$zip_code";
					?>
				>
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="city" required placeholder="City"
					<?php
						if (isset($edit) or isset($change)) echo "value=\"$city\"";
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
						if (isset($edit) or isset($change)) echo "value=\"$country\"";
					?>
				>
			</div>
		</div>
	
		<!-- Password -->
		<div class="form-group">
			<?php
				if (isset($ErrorPwdDifferents)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$ErrorPwdDifferents."</div>";
				if (isset($ErrrorPwdLength)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$ErrrorPwdLength."</div>";
				if (isset($ErrorPwdIncorrect)) echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$ErrorPwdIncorrect."</div>";
			?>	
			<label for="first_name" class="control-label col-sm-2">Password</label>
			<div class="col-sm-9">
				<input type="password" class="form-control" name="pwd1" pattern=".{6,}" required title="Valid password must be of 6 characters minimum
				<?php if (!isset($change)) echo "placeholder='Valid password must be of 6 characters minimum'"; ?>
				">
			</div>
		</div>
		
		<?php if (!isset($change)) { ?>
		<!-- Confirm Password-->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-9">
				<input type="password" class="form-control" name="pwd2" pattern=".{6,}" placeholder="Confirm password" required title="Valid password must be of 6 characters minimum">
			</div>
		</div>
		<?php } ?>
		
		<!-- Submit -->		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" formaction='register.php' class="btn btn-default">Submit</button>
			</div>
		</div>
		
		<!-- Hidden -->
		<div class="form-group">
			<input type="hidden" class="form-control" name="edit">
		</div>
		
		<?php if (isset($change)) { ?>
		<div class="form-group">
			<input type="hidden" class="form-control" name="change">
		</div>
		<?php } ?>
			
	</form>
</div>
<?php require "footer.php" ?>
	
