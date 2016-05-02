<?php
include("functions.php");
session_start();
if (isset($_POST['edit'])) {
	$name = $_POST['name'];
	$firstname = $_POST['firstname'];
	$pseudo = $_POST['pseudo'];
	$email = $_POST['email'];
	$edit = $_POST['edit'];
}

include("boilerplate.php");
include("navbar.php");
?>	
	<div class="container">
		<form class="form-horizontal" action="new_account.php" method='post'>
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
				<label for="name" class="col-sm-2 control-label">Pseudo</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="pseudo" required pattern="[a-zA-Z0-9]{2,}" title="Must contain at least 2 characters or numbers" placeholder=""
					<?php
						if (isset($edit)) echo "value=$pseudo>";
					?>
				</div>
			</div>			
			
			<div class="form-group">
				<!------- Email ------->
				<label for="name" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" name="email" required pattern="[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}" title="Please enter a valid email address" placeholder="example@truc.machin"
					<?php
						if (isset($edit)) echo "value=$email>";
					?>
				</div>
				<br>
				<div> 
					<?php
						//if (isset($emailError)) echo "$emailError";
					?>
				</div>
			</div>	
			
			<!-------------- ATTENTION FAIRE ADRESSE ----------->
			
			
			<div class="form-group">
				<!------- Password ------->
				<label for="first_name" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="password1" required title="This field is required"> <!---- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"---->
				</div>
			</div>

			<div class="form-group">
				<!------- Password (confirm) ------->
				<label for="first_name" class="col-sm-2 control-label">(confirm) Password</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" name="password2" required title="This field is required">
				</div>
			</div>
			
			<div class="form-group">
					<input type="hidden" class="form-control" name="edit">
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" formaction='new_account.php' class="btn btn-default">Sign in</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
