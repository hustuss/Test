$(document).ready(function() {
    {
	var komno_url = '/ezKirkesok/var/ezwebin_site/storage/kommunesok.php';                

	function kom_searchChurch(selected){	 		    
	    $.ez('kommunesok::churchSearch::'+selected.id,'',function(data){
		if (data.error_text )
		    $( "#bilde_container").html( data.error_text );
		else
		    $("#bilde_container").html( data.content );		
		$(".caption_default").hoverIntent(up,down);
	    });
	}

	$( "#kommune" ).autocomplete({
	    source: komno_url,
	    minLength: 2,
	    select: function( event, ui ) {                            
		kom_searchChurch(ui.item);
		$("#input_komno_hidden").val(ui.item.id);
	    }
	});
		    
	$('.sort_by button:first').addClass("selected");
	$('.sort_by_time button:first').addClass("selected")
		    
	$(".sort_by button").click(function(){
	    $(".sort_by button").removeClass("selected");
	    $(this).addClass("selected");
	    if($(this).val() == 'navn'){
		$('.sort_by_time').hide();
		$('.letterSelector').show();
	    }else{
		$('.sort_by_time').show();
		$('.letterSelector').hide();
		$(".letterSelector button").removeClass("selected");
	    }
	    buildQuery();
	});
    }
});  

function initMap(){
    var myLatlng = new google.maps.LatLng(63.318603, 11.28662);
    var myOptions = {
	zoom: 4,
	center: myLatlng,
	mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var mapDiv = $("#kommunesok_map");
    map = new google.maps.Map(mapDiv, myOptions);
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);	
    mc = new MarkerClusterer(map, mcOptions);
    mcOptions = {
	gridSize: 70, 
	maxZoom: 15,
	clusterSize: 50
    };
}

//adding comment to check update
function loadChurches(){
    
    var komNr = $('#input_komno_hidden').val();
    var churchLayer = new google.maps.KmlLayer(
	$.ez('kommunesok::churchSearch::'+ komNr,'',function(data){
	    $("#bilde_container").html( data.content );	
	}));
    churchLayer.setMap(map);
}