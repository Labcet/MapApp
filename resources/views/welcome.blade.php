<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MapApp</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            #map { height: 600px; width: 100%;}
        </style>

        <!-- LEAFLETJS CONFIGURATION -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

        <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    </head>
    <body>

        <div class="card">
            <div class="card-header">
                Mapa
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form action="">
                        <div class="form-group">
                            <label for="inputState">Linea</label>
                            <select id="ruta" class="form-control" onchange="getPos(this)">
                                <option selected>Choose...</option>
                                @for ($i = 0; $i < count($rutas); $i++)
                                    <option value="{{ $rutas[$i]->puntos }}">{{ $rutas[$i]->nombre }}</option>
                                @endfor
                            </select>
                        </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            </div>
    </body>

    <script>
        
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        function getPos(selectObject){

            //this.remove();

            var value = selectObject.value;
            var arrayPuntos = value.split('|');

            var arrayCoordIni = arrayPuntos[0].split(',');
            var arrayCoordFin = arrayPuntos[1].split(',');

            L.Routing.control({ 
                waypoints: [ 
                    
                    L.latLng(arrayCoordIni[0], arrayCoordIni[1]),
                    L.latLng(arrayCoordFin[0], arrayCoordFin[1])
                ]
            }).addTo(map);
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
