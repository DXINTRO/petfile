<div class="col-md-4 col-md-offset-4" id="sigInPage">
    <br />
    <div class="alert alert-success " style="display:none;">  </div>
    <div class="alert alert-danger" style="display:none;"><center>La cuenta o la contraseña es incorrecta.</BR><a href="#" onclick="send();return false">¿ya no tienes acceso?</a> </center></div>
    <form class="form-signin" action="signin/postSignIn" method="POST">
        <div class="row">
            <div class="col-md-12">
                <h2 class="form-signin-heading">Inicio de Sesión</h2>
            </div>
            </br>
            <div class="col-md-12">
                <input type="email" class="form-control" placeholder="Email" name="userEmail" required autofocus>
            </div>
            </br>
            <div class="col-md-12">
                <input type="password" class="form-control" placeholder="Contraseña" name="userPassword" required>
            </div>
        </div>
        <br/>
        <br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>
</div>

<script>
    function send() {
        $(".alert-danger").hide();
        $(".alert-success").show().html('Un correo de recuperacion fue enviado a su casilla de correos. &#9745;');
    }
</script>