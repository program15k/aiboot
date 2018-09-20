
(function($){
	
	$(window).load(function() {
 $(function() {
    new Maplace({
		map_div:'#mapa',
		show_markers: true,
		locations: [{
        lat: 51.0975162,
        lon: 19.0494857,
        zoom: 15,
		controls_on_map:false,
		 icon: 'wp-content/themes/aiboot42/img/pin-red-dark.png'
		}],
		 styles: {
        'AI': [
    {
        "featureType": "administrative.country",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#ff0000"
            }
        ]
    }
]



,
					}
		}).Load();

});
});

})(jQuery);
