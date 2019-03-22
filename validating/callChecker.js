callChecker();​

function callChecker() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            $.getJSON('http://ws.geonames.org/countryCode', {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
                type: 'JSON'
            }, function(result) {
                if (result.countryName != 'IRELAND') {
                    alert("Warning! this caller isn't calling outside of Ireland");
                }
            });
        });
    };
}