<div class="container" style="margin-top:25px;">
<div class="col-md-6 col-md-offset-3 panel panel-default" style="padding:0px;">
	<div class="panel-heading"> REGISTRO DE USUARIO</div>
  <div class="panel-body">
    <div class="col-md-12">
    	<div class="alert alert-success" style="display:none;">USUARIO REGISTRADO !!</div>
    	<form id="userRegister" role="form" action="registration/register" method="POST">
		  <div>
		  	<h3>INFORMACION DEL USUARIO</h3>
		  	<div class="form-group">
			    <label for="inputEmail">Rut Usuario </label>
                            <input type="text" class="form-control" name="inputRut" id="inputRut" placeholder="Ingrese Rut Cliente"  maxlength="10">
			  </div>
			  <div class="form-group">
			    <label for="inputEmail">Email </label>
			    <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="ingrese email" required>
			  </div>
			  <div class="form-group">
			    <label for="username">Usuario</label>
			    <input type="text" class="form-control" name="username" id="username" placeholder="Usuario" minlength="5" required>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword">Contraseña</label>
			    <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Pass" minlength="6" maxlength="50" required>
			  </div>
			  <div class="form-group">
			    <label for="confirm-inputPassword">Confirma Contraseña</label>
			    <input type="password" class="form-control" name="confirm_inputPassword" id="confirm_inputPassword" placeholder="Confirma Pass" minlength="6" maxlength="50" required>
			  </div>
			  <div class="form-group">
			    <label for="firstName">Nombre</label>
			    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="nombre" minlength="3" required onkeypress="return soloLetras(event)">
			  </div>
				<div class="form-group">
				    <label for="lastName">Apellido</label>
				    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="apellido" minlength="3" required onkeypress="return soloLetras(event)">
			  	</div>
			  	<div class="form-group">
				    <label for="address">Dirección</label>
				    <textarea class="form-control" name="address" id="address" placeholder="direccion" required></textarea>
			  	</div>
                <div class="form-group">
				    <label for="address">Comuna</label>
				    <input type="text" class="form-control" name="city" id="city" placeholder="Comuna" required onkeypress="return soloLetras(event)"></textarea>
			  	</div>
			  	<div class="form-group">
				    <label for="lastName">Numero de Contacto</label>
				    <input type="number" class="form-control" name="contactNo" id="contactNo" placeholder="numero contacto" minlength="6" required onkeypress="return numeros(event)">
			  	</div>
		  	</div>
		  	<h3>INFORMACION DE LA MASCOTA</h3>
			  <div class="form-group">
			    <label for="petName">Nombre de Mascota</label>
			    <input type="text" class="form-control" name="petName" id="petName" placeholder="Nombre Mascota" required onkeypress="return soloLetras(event)">
			  </div>
			  <div class="form-group">
			    <label for="petSpecies">Especie</label>
			    <select class="form-control" name="petSpecies" id="petSpecies" >
			    	<option value="Perro">Perro</option>
			    	<option value="Gato">Gato</option>
			    </select>
                </div>
               <div class="form-group">
			    <label for="petRace">Raza</label>
			    <input type="text" class="form-control" name="petRace" id="petRace" placeholder="Raza Mascota" required onkeypress="return soloLetras(event)">
			  </div>
			  <div class="form-group">
			    <label for="petGender">Genero</label>
			    <select class="form-control" name="petGender" id="petGender" >
			    	<option value="Hembra">Hembra</option>
			    	<option value="Macho">Macho</option>
			    </select>
                </div>
              <div class="form-group">
			    <label for="petAge">Edad</label>
			    <input type="number" class="form-control" name="petAge" id="petAge" placeholder="Edad Mascota" required>
			  </div>
			    <!-- <input type="text" class="form-control" name="petGender" id="petGender" placeholder="Pet Gender" minlength="4" required> -->
                <div class="form-group">
			    <label for="petColor">Color</label>
			    <input type="text" class="form-control" name="petColor" id="petColor" placeholder="Color" required onkeypress="return soloLetras(event)">
			  </div>
			  
			  <div class="form-group">
				    <label for="petHistory">Observaciones</label>
				    <textarea class="form-control" name="petHistory" id="petHistory" placeholder="Observacion de su mascota" required></textarea>
			  	</div>
		  	
		  <button type="submit" class="btn btn-default pull-right">REGISTRAR</button>
		</form>
    </div>
  </div>
</div>
</div>