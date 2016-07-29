$(document).ready(function(){
  setTimeout(function(){
    initialize();
  },1000);
});

var initialLocation;
var browserSupportFlag =  new Boolean();
var map;

function initialize() {

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      $('#txt-lat').val(position.coords.latitude);
      $('#txt-lng').val(position.coords.longitude);
      map.setCenter(pos);
    }, function() {
      // handleLocationError(true, infoWindow, map.getCenter());
      // alert('Browser does not support Geolocation - 1');
      getHospitalLocation();
    });
  } else {
    // Browser doesn't support Geolocation
    // alert('Browser does not support Geolocation - 2');
    getHospitalLocation();
  }
}

function getHospitalLocation(){
  var jqxhr = $.post('../dist/php/getHospitalLocation.php', { institute_id: $('#txt-inst').val() }, function(result){
    $('#txt-lat').val(result[0].lat);
    $('#txt-lng').val(result[0].lng);
  }, "json");
}
