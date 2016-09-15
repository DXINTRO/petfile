<div class="col-md-4 col-md-offset-4" id="sigInPage">
    <br />
    <div class="alert alert-danger" style="display:none;">Olvido su Contraseña?</div>
    <form class="form-signin" action="user/postSignIn" method="POST">
        <h2 class="form-signin-heading">Inicio de Sesión</h2>
        <br/>
        <input type="email" class="form-control" placeholder="Email" name="userEmail" required autofocus>
        <input type="password" class="form-control" placeholder="Contraseña" name="userPassword" required>
       	<br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

</div>