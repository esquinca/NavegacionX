var map; 
var marker; 
var markas = []; 
var infowindow; 
let count; 
$(function() { 
  init(); 
}); 
 
function init() { 
  moment.locale('es'); 
 
    map = new google.maps.Map(document.getElementById('googlemap'), { 
    zoom: 8, 
    center: new google.maps.LatLng(20.960072,-87.264404), 
    //mapTypeId: google.maps.MapTypeId.ROADMAP 
  }); 
 
  infowindow = new google.maps.InfoWindow; 
 
  addLocation(); 
} 
 
function addLocation(){ 
  let something; 
  let myProp = 'gps_fix'; 
  let object1 = []; 
  let object2= []; 
  //let algo; 
 
  let name, mac, last_contact, heading, lat, lng, speed, time; 
  let status; 
  let fechaico; 
  let contentstring; 
 
  //Api Icomera. 
  $.ajax({ 
    url: "/geoLoc", 
    type: "GET", 
    success: function (data) { 
      //console.log(data); 
      datax = JSON.parse(data); 
          console.log(datax); 
      //something = datax.devices.device[0].gps_fix["@attributes"].latitude; 
          //$datax = $decode->devices->device[0]->gps_fix->{'@attributes'}; 
          count =  datax.devices.device; 
 
          //console.log(Object.keys(count)); 
          count = Object.keys(count).length -2; 
          //algo = datax.devices.device.length; 
          //console.log(count); 
          //console.log(algo); 
          // lat = datax.devices.device[7]["@attributes"].name; 
          // console.log(lat); 
 
          for (i = 0; i < count; i++) { 
            //console.log("iteración: " + i); 
            if (datax.devices.device[i].hasOwnProperty(myProp)) { 
              status = "Online"; 
              object1.push( 
                { 
                  name: datax.devices.device[i]["@attributes"].name, 
                  mac: datax.devices.device[i]["@attributes"].ethernet_mac, 
                  last_contact: datax.devices.device[i]["@attributes"].last_contact, 
                  heading: datax.devices.device[i].gps_fix["@attributes"].heading, 
                  lat: datax.devices.device[i].gps_fix["@attributes"].latitude, 
                  lng: datax.devices.device[i].gps_fix["@attributes"].longitude, 
                  speed: datax.devices.device[i].gps_fix["@attributes"].speed, 
                  time: datax.devices.device[i].gps_fix["@attributes"].time, 
                  status: status 
                } 
              ); 
            }else{ 
              status = "Offline"; 
              object1.push( 
                { 
                  name: datax.devices.device[i]["@attributes"].name, 
                  mac: datax.devices.device[i]["@attributes"].ethernet_mac, 
                  last_contact: datax.devices.device[i]["@attributes"].last_contact, 
                  status: status 
                } 
              ); 
             } 
          } 
          console.log(object1); 
 
      var j; 
 
 
      for (j = 0; j < object1.length; j++) { 
        if (object1[j].status === "Online") { 
            marker = new google.maps.Marker({ 
                 position: new google.maps.LatLng(object1[j].lat, object1[j].lng), 
                 map: map 
            }); 
            markas.push(marker); 
 
            google.maps.event.addListener(marker, 'click', (function(marker, j) { 
            return function() { 
              fechaico = moment.unix(object1[j].time).format("YYYY-MM-DD HH:mm:ss"); 
              contentstring = "<div style=\"overflow: hidden;\"><b>Device:<\/b> " + object1[j].name + "<br><b>Time:<\/b> " + fechaico + "<br><b>Speed:<\/b> " + object1[j].speed + "<br><b>Heading:<\/b> " + object1[j].heading+"°"; 
              infowindow.setContent(contentstring); 
              infowindow.open(map, marker); 
            } 
            })(marker, j)); 
        }else{ 
 
        } 
      } 
 
    }, 
    error: function (data) { 
      console.log('Error:', data); 
    } 
  }); 
} 
 
function setMapOnAll(map) { 
  for (var i = 0; i < markas.length; i++) { 
    markas[i].setMap(map); 
  } 
} 
 
function clearMarkers() { 
  setMapOnAll(null); 
} 
 
function deleteMarkers() { 
  clearMarkers(); 
  markas = []; 
} 
 
function refreshMarkers() { 
  deleteMarkers(); 
  addLocation(); 
} 
 
$('#btn-refresh').click(function(){ 
  refreshMarkers() 
});