
	<h2>Log in/Register</h2>
	<form class="form-horizontal" action="login.php" method="post"role="form">
	  <div class="form-group">
	    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-10">
	      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Login</button>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      Forgotten your <a href="recover.php?mode=username">username</a> or <a href="recover.php?mode=password">password</a>?
	    </div>
	  </div>
	</form>