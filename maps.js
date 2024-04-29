function iniciarMap(){
    var coord = {lat:41.11751434285039, lng:1.2178796969406618};
    var map = new google.maps.Map(document.getElementById('map'),{
        zoom: 14,
        center: coord
    });
    var marker = new google.maps.Marker({
        position: coord,
        map: map
    });
}