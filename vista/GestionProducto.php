<!------ Estilo de mapa y panel de busqueda ---------->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/styleMap.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css">


<div class="row" id="contatti">
<div class="container mt-5" >

    <div class="row" style="height:550px;">
      <div class="col-md-6 maps" >
         
            <div class="row align-items-center">

            <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
            <div id="map" class="map map-home" style="margin:12px 0 12px 0;height:450px; width: 600px;"></div>
            <script>
            var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, {
            maxZoom: 18,
            attribution: osmAttrib
            });
            var map = L.map('map').setView([6.25, -75.5661], 17).addLayer(osm);
            L.marker([6.25, -75.5661])
            .addTo(map)
            .bindPopup('Colteger')
            .openPopup();
            </script>

        </div>
         
      </div>
      <div class="col-md-6">
        <h2 class="text-uppercase mt-3 font-weight-bold text-white">FILTRO DE UBICACIÓN</h2>
        <form action="">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <select class='form-control' name='txtProveedor' required>
                    <option value=''></option>
                    <option>Proveedor1</option>
                    <option>Proveedor2</option>
                    <option>Proveedor3</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <select class='form-control' name='txtCliente' required>
                    <option value=''></option>
                    <option>Cliente1</option>
                    <option>Cliente2</option>
                    <option>Cliente3</option>
                </select>
              </div>
            </div>
            
            <div class="col-12">
            <div class="form-group">

            </div>
            </div>
            <div class="col-12">
              <button class="btn btn-light" type="submit">Buscar</button>
            </div>
          </div>
        </form>
        <div class="text-white">
        <h2 class="text-uppercase mt-4 font-weight-bold">DELL COMPANY</h2>

        <i class="fas fa-phone mt-3"></i> <a href="tel:+"> 302 512 3456</a><br>
        <i class="fa fa-envelope mt-3"></i> <a href="">correo@email.co</a><br>
        <i class="fas fa-globe mt-3"></i> $20.000.000<br>
        <i class="fas fa-globe mt-3"></i> Documento<br>
        <div class="my-4">
        <a href=""><i class="fab fa-facebook fa-3x pr-4"></i></a>
        <a href=""><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
        </div>
      </div>

    </div>
</div>
</div>

