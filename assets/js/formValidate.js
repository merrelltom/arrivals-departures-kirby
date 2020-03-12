var months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEPT", "OCT", "NOV", "DEC" ];

function dateString(day, month, year) {
    var date = "";
    
    if (day.length !== 0 ) {
        year = year.substring(2,4);
        if (day.length === 1) {
            day = "0" + day + "-";
        } else {
            day += "-";
        }
        date += day;
    }
    if (month.length !== 0) {
        if (day.length === 0) {
            month = months[month - 1];
        }
        date += (month + "-");
    }
    
    date += year;
    
    return date;
}




var placeSearch, autocomplete;

function initAutocomplete() {
  autocomplete = new google.maps.places.Autocomplete(
          document.getElementById('ad_location'), {types: ['geocode']});
  autocomplete.setFields(['geometry']);
  autocomplete.addListener('place_changed', fillInAddress);
}  


function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();
    var lat = place.geometry.location.lat();
    var lng = place.geometry.location.lng();
    document.getElementById("latlng").value = lat + "," + lng;
    document.getElementById("latlng").disabled = false;
  }