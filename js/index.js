
function initAutocomplete() {
	const map = new google.maps.Map(document.getElementById("map"), {
	  center: { lat: -33.8688, lng: 151.2195 },
	  zoom: 13,
	  mapTypeId: "roadmap",
	});
	// Create the search box and link it to the UI element.
	const input = document.getElementById("location");
	const searchBox = new google.maps.places.SearchBox(input);
  
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
	// Bias the SearchBox results towards current map's viewport.
	map.addListener("bounds_changed", () => {
	  searchBox.setBounds(map.getBounds());
	});
  
	let markers = [];
  
	// Listen for the event fired when the user selects a prediction and retrieve
	// more details for that place.
	searchBox.addListener("places_changed", () => {
	  const places = searchBox.getPlaces();
  
	  if (places.length == 0) {
		return;
	  }
  
	  // Clear out the old markers.
	  markers.forEach((marker) => {
		marker.setMap(null);
	  });
	  markers = [];
  
	  // For each place, get the icon, name and location.
	  const bounds = new google.maps.LatLngBounds();
  
	  places.forEach((place) => {
		if (!place.geometry || !place.geometry.location) {
		  console.log("Returned place contains no geometry");
		  return;
		}
  
		const icon = {
		  url: place.icon,
		  size: new google.maps.Size(71, 71),
		  origin: new google.maps.Point(0, 0),
		  anchor: new google.maps.Point(17, 34),
		  scaledSize: new google.maps.Size(25, 25),
		};
  
		// Create a marker for each place.
		markers.push(
		  new google.maps.Marker({
			map,
			icon,
			title: place.name,
			position: place.geometry.location,
		  }),
		);
		if (place.geometry.viewport) {
		  // Only geocodes have viewport.
		  bounds.union(place.geometry.viewport);
		} else {
		  bounds.extend(place.geometry.location);
		}
	  });
	  map.fitBounds(bounds);
	});
  }
  
  window.initAutocomplete = initAutocomplete;
// let map;
// let service;
// let infowindow;

// function initMap() {
//   const sydney = new google.maps.LatLng(25.8910517,-80.1228812);

//   infowindow = new google.maps.InfoWindow();
//   map = new google.maps.Map(document.getElementById("map"), {
//     center: sydney,
//     zoom: 15,
//   });

//   const request = {
//     query: "Sea View Hotel",
//     fields: ["name", "geometry", "formatted_address", "rating", "price_level"],
//   };

//   service = new google.maps.places.PlacesService(map);
//   service.findPlaceFromQuery(request, (results, status) => {
//     if (status === google.maps.places.PlacesServiceStatus.OK && results) {
//       for (let i = 0; i < results.length; i++) {
//         createMarker(results[i]);
// 		console.log(results[i]);
//       }

//       map.setCenter(results[0].geometry.location);
//     }
//   });
// }

// function createMarker(place) {
//   if (!place.geometry || !place.geometry.location) return;

//   const marker = new google.maps.Marker({
//     map,
//     position: place.geometry.location,
//   });

//   google.maps.event.addListener(marker, "click", () => {
//     infowindow.setContent(place.name || "");
//     infowindow.open(map);
//   });
// }

// window.initMap = initMap;
