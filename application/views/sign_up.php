<div class="container" style="margin-top:25px;">
<div class="col-md-6 col-md-offset-3 panel panel-default" style="padding:0px;">
  <div class="panel-heading"> Register</div>
  <div class="panel-body">
    <div class="col-md-12">
    	<div class="alert alert-success" style="display:none;">Registration Successful!</div>
    	<form id="userRegister" role="form" action="registration/register" method="POST">
		  <div>
		  	<h3>User Information</h3>
			  <div class="form-group">
			    <label for="inputEmail">Email address</label>
			    <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter email" required>
			  </div>
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" name="username" id="username" placeholder="Username" minlength="5" required>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword">Password</label>
			    <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" minlength="6" maxlength="50" required>
			  </div>
			  <div class="form-group">
			    <label for="confirm-inputPassword">Confirm Password</label>
			    <input type="password" class="form-control" name="confirm_inputPassword" id="confirm_inputPassword" placeholder="Confirm Password" minlength="6" maxlength="50" required>
			  </div>
			  <div class="form-group">
			    <label for="firstName">First Name</label>
			    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" minlength="3" required>
			  </div>
				<div class="form-group">
				    <label for="lastName">Last Name</label>
				    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" minlength="3" required>
			  	</div>
			  	<div class="form-group">
				    <label for="address">Address</label>
				    <textarea class="form-control" name="address" id="address" placeholder="Address" required></textarea>
			  	</div>
			  	<div class="form-group">
				    <label for="lastName">Contact Number</label>
				    <input type="number" class="form-control" name="contactNo" id="contactNo" placeholder="Contact Number" minlength="6" required>
			  	</div>
		  	</div>
		  	<h3>Pet Information</h3>
			  <div class="form-group">
			    <label for="petName">Pet Name</label>
			    <input type="text" class="form-control" name="petName" id="petName" placeholder="Pet Name" required>
			  </div>
			  <div class="form-group">
			    <label for="petType">Pet Type</label>
			    <input type="text" class="form-control" name="petType" id="petType" placeholder="Pet Type" required>
			  </div>
			  <div class="form-group">
			    <label for="petGender">Pet Gender</label>
			    <select class="form-control" name="petGender" id="petGender" >
			    	<option value="female">Female</option>
			    	<option value="male">Male</option>
			    </select>
			    <!-- <input type="text" class="form-control" name="petGender" id="petGender" placeholder="Pet Gender" minlength="4" required> -->
			  </div>
			  <div class="form-group">
				    <label for="petHistory">History Description</label>
				    <textarea class="form-control" name="petHistory" id="petHistory" placeholder="Pet History" required></textarea>
			  	</div>
		  	</div>
		  <button type="submit" class="btn btn-default pull-right">Register</button>
		</form>
    </div>
  </div>
</div>
</div>