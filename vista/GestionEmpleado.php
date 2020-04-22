<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    
    <script type="text/javascript">

function redireccionar(url)
{
    window.location = url;
}
</script>

<link rel="stylesheet" type="text/css" href="style.css">


<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://www.pinclipart.com/picdir/big/90-900518_subscribe-now-employees-provident-fund-organisation-clipart.png" alt=""/>

                        <h3>Bienvenido Admin</h3>
                        <p>Formulario para administración de clientes, proveedores, empleado y producto</p>
                        
                    </div>
                    <div class="col-md-9 register-right">
               
                        <select class="nav nav-tabs nav-justified" onChange="redireccionar(this.value)" style="background-color: #6bc6fa">
                            <option class="hidden"  selected disabled>Seleccione una opción</option>
                            <option value="index.php">Empleado</option>
                            <option value="GestionProveedor.php">Proveedor</option>
                            <option value="GestionCliente">Cliente</option>
                            <option value="GestionProducto">Producto</option>
                        </select>
                    
                            
                        <div class="tab-content" id="myTabContent" >
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Datos Empleado</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Documento *" name="txtDocumento" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nombre y apellido*" name="txtNombre"/>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <h6>Fecha de ingreso:</h6>
                                            </div>
                                            <input type="date" class="form-control" name="txtFechaIngreso" >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Salario Básico" name="txtSalario"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Deducción" name="txtDeduccion"/>
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="chkEmpleado" value="Empleado">
                                                    <span> Empleado </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="chkAdministrador" value="Administrador" checked>
                                                    <span> Administrador </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" name="txtEmail"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtTelefono" class="form-control" placeholder="Telefono *" value=""/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtCelular" class="form-control" placeholder="Celular" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="txtGenero">
                                                <option class="hidden"  selected disabled>Genero</option>
                                                <option>Masculino</option>
                                                <option>Femenino</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h6>Adjuntar foto:</h6>
                                            <input type="file" name="fileFoto" accept=".jpg,.png">
                                        </div>
                                        <div class="form-group">
                                            <h6>Adjuntar hoja de vida:</h6>
                                            <input type="file" name="fileHv" accept=".doc,.docx,.pdf">
                                        </div>
                                        <input type="submit" class="btnRegistrars"  value="Registrar"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


