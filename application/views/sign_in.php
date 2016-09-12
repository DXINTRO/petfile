<div class="col-md-4 col-md-offset-4" id="sigInPage">
    <br />
    <div class="alert alert-danger" style="display:none;">Olvido Password?</div>
    <form class="form-signin" action="user/postSignIn" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <br/>
        <input type="email" class="form-control" placeholder="Email address" name="userEmail" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="userPassword" required>
       	<br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div>