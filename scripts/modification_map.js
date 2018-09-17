var mymap = L.map('mapid').setView([47.729373, 7.310629], 13);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZ3BpYWxsYSIsImEiOiJjamlhcWI1ajExYTFxM2tyeHh4MWF1bjRxIn0.xsG8CN5ZyPV4JwYojldaLg'
}).addTo(mymap);

function onMapClick(e) {
    document.getElementById('lng_input').value = e.latlng.lng.toString();
    document.getElementById('lat_input').value = e.latlng.lat.toString();
}

mymap.on('click', onMapClick);

