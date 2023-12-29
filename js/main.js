$("#sel").on('change', function() {
    if(this.value == "simplyhired") {
        window.location.href = simply_url;
    }
    else if (this.value == "indeed") {
        window.location.href = indeed_url;
    }
    // else if (this.value == "careerjet") {
    //     window.location.href = careerjet_url;
    // }
    // else if (this.value == "jobisjob") {
    //     window.location.href = jobisjob_url;
    // }
    // else if (this.value == "usajobs") {
    //     window.location.href = usajobs_url;
    // }
    // else if (this.value == "jobsintrucks") {
    //     window.location.href = jobsintrucks_url;
    // }
    // else if (this.value == "alltruckjobs") {
    //     window.location.href = alltruckjobs_url;
    // }
	// else if (this.value == "coolworks") {
    //     window.location.href = coolworks_url;
    // }
	else if (this.value == "westin") {
        window.location.href = westin_url;
    }
})

var url = westin_search_url;
var start_url = westin_start_url;
var stop_url = westin_stop_url;
var format_url = format_url;
var scrape_url = scrape_url;
var westin_table_url = westin_table_url;
var search = search;
var end = end;

var save_url = save_url
var init_url = init_url
var view_url = view_url
let api_key = 'AIzaSyDs-0kCpaWs6MLA3beRKO690-NdIL_ubn0'
let map_url = 'https://maps.googleapis.com/maps/api/nearbysearch/json?key=' + api_key

let BOT_IMG = img_url + 'img/chatbot.png';
let PERSON_IMG = img_url + "img/chatuser.png";

let BOT_NAME = "";
let PERSON_NAME = "";

$(document).ready(function(){
	$('#status').hide();
	$('#btn-modal').hide();
	// $('#myModal').hide();
	$('#location-lbl').show();
	$('#location').show();
	$('#location-lbl1').hide();
	$('#location1').hide();
	$('#chat-arrow').hide();
	$('.msger').hide();
})
var flag = false;
$('#btn_search').click(function (e) {
	e.preventDefault();
	$.ajax({ 
        method: 'POST', 
        url: westin_search_url,    
		dataType: 'JSON',
        data: { 'category' : $('#search-sel').val(),
			'value': $('#search').val()
		}	, 
        success: function(res){    
			console.log(res)
            $('#table-westin').html(res);
        }, 
        error: function(e){  
			console.log(e)
            alert('Error while request..' + e['responseText']); 
        } 
	});
})

$('#btn-refresh').click(function () {
	window.location.href = westin_url
})

$('#btn-start').click(function (e) {
	e.preventDefault();

	var geocoder;
	// var map;
	geocoder = new google.maps.Geocoder();
	var start_url = westin_start_url
	if($('#location').val() == "") {
		alert('Please Enter Location.')
	}
	else if ($('#category').val() == "") {
		alert('Please Enter Category.')
	}
	else if ($('#radius').val() == "") {
		alert('Please Enter Radius.')
	}
	else {
		const radioBtn = document.querySelectorAll('input[name="size"]');
		let selectedSize;
		for (const radioButton of radioBtn) {
			if (radioButton.checked) {
				selectedSize = radioButton.value;
				break;
			}
		}
		$('div.overlay').show();
		$('#status').show();
		var address = $('#location').val();
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == 'OK') {
				let lat = results[0].geometry.location.lat();
				let lng = results[0].geometry.location.lng();
				var category = $('#category').val();
				var radius = $('#radius').val();
				$.ajax({ 
					method: 'POST', 
					url: start_url,  
					dataType: 'JSON',
					data: {
						'location': $('#location').val(),
						'lat' : lat,
						'lng' : lng,
						'radius' : radius,
						'category' : category,
						'allow': selectedSize
					}, 
					success: function(res){    
						console.log(res);
						$('div.overlay').hide();
						$('#status').text("Scrape End.");
						toastr.success("Scraping is End.")
						window.location.href = westin_url;
					}, 
					error: function(e){  
						console.log(e)
						$('div.overlay').hide();
					} 
				});
				
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
				$('div.overlay').hide();
				window.location.href = westin_url;
			}
		});	
	}
	
	
})

$('#btn-stop').click(function (e) {
	e.preventDefault();
	$.ajax({ 
        method: 'POST', 
        url: stop_url,    
		dataType: 'JSON',
        success: function(res){    
			alert(res)
        }, 
        error: function(e){  
			console.log(e)
            // alert('Error while request..' + e['responseText']); 
        } 
	});
})

$('#btn_format').click(function (e) {
	e.preventDefault();
	$.ajax({ 
        method: 'POST', 
        url: format_url,    
		dataType: 'JSON',
        data: { 
		}, 
        success: function(res){    
			window.location.href = westin_url;
        }, 
        error: function(e){  
			console.log(e)
            // alert('Error while request..' + e['responseText']); 
        } 
	});
})

$('#search').on('change', function() {
	$.ajax({ 
        method: 'POST', 
        url: url,    
		dataType: 'JSON',
        data: { 'location' : $('#search').val() }, 
        success: function(res){    
			console.log(res)
            $('#table-westin').html(res);
        }, 
        error: function(e){  
			console.log(e)
            // alert('Error while request..' + e['responseText']); 
        } 
	});
})

$('#btn-ok').click(function () {
	// clearInterval(timerID);
	// if($('input[name="list"]:checked').val() != )
	// $('#status').hide();
	
	if($('input[name="list"]:checked').val() != null) {
		$('div.overlay').show();
		$.ajax({ 
			method: 'POST', 
			url: again_url,    
			dataType: 'JSON',
			data: { 
				'location' : $('input[name="list"]:checked').val() ,
			}, 
			success: function(res){    
				console.log(res);
				$('#status').text("Scrape is running. Please Refresh the page to see more results.")
				// $('div.overlay').hide();
				// alert("Success!")
			}, 
			error: function(e){  
				console.log(e)
			} 
		});
	}
	else{
		$('#status').text("Please, Restart the scraping.")
	}
})

$('#btn-close').click(function () {
	$('#status').hide();
})

$('#btn-save').click(function (e) {
	e.preventDefault();
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); 
	var HH = String(today.getHours() + 1).padStart(2, '0'); 
	var MM = String(today.getMinutes() + 1).padStart(2, '0'); 
	var ss = String(today.getSeconds() + 1).padStart(2, '0'); 
	var yyyy = today.getFullYear();

	today = yyyy + '-' + mm + '-' + dd;
	todaytime = yyyy + '-' + mm + '-' + dd + ':' + HH + '-' + MM + '-' + ss;
	$.ajax({ 
		method: 'POST', 
		url: save_url,    
		dataType: 'JSON',
		data: { 
			'date' : today ,
			'datetime' : todaytime
		}, 
		success: function(res){    
			console.log(res);
			window.location.href = westin_url;
			// $('div.overlay').hide();
			// alert("Success!")
		}, 
		error: function(e){  
			console.log(e)
			// alert('Error while request..' + e['responseText']); 
		} 
	});
})

$('#btn-excel').click(function (e) {
	e.preventDefault();
	// console.log($('.btn-view').attr('id'))
	let current = window.location.href;
	let pageID = current.split('/')[current.split('/').length - 1]
	$.ajax({ 
		method: 'POST', 
		url: excel_url,    
		dataType: 'JSON',
		data: {
			'id' : pageID
		},
		success: function(res){
			toastr.success("Success Excel Download!");

			 var workbook = XLSX.utils.book_new();
			 var data = res;
			 const Heading = [['Title', 'Review', 'Level', 'Types','Rating','Destination','Straight(m)', 'Eamil', 'Direction', 'Photo', 'Driving_time', 'Walking_time', 'Transit_time', 'Cycling_time','Latitude', 'Longitude', 'Website', 'Phone Number', 'Zipcode', 'Housing Contact Email', 'Contact Name','Additional Contact']];
			//  const Heading = {'A1':'title', '1':'review', '2':'level', '3':'types','4':'rating','5':'dest_location', '6':'website', '7':'phoneNumber', '8':'direction', '9':'straight', '10':'latitude', '11':'longitude', '12':'driving_time', '13':'transit_time', '14':'walking_time', '15':'cycling_time', '16':'photo', '17':'zipcode', '18':'housingContactEmail', '19':'contactName', '20':'additionalContact'}
			 var ws = XLSX.utils.json_to_sheet(data, {origin: 'A2', skipHeader: true});
			 XLSX.utils.sheet_add_aoa(ws, Heading);
			 XLSX.utils.book_append_sheet(workbook, ws, "Results");
			 XLSX.writeFile(workbook, 'google-map-scrape.xlsx', {type: 'file'});
		}, 
		error: function(e){  
			console.log(e)
			// alert('Error while request..' + e['responseText']); 
		} 
	});
})

$('#chat-box').click(function (e) {
	e.preventDefault();
	
	if (!flag) {
		flag = true;
		$('.msger').show();
		$('#chat-msg-svg').hide();
		$('#chat-arrow').show();
	}
	else {
		flag = false;
		$('.msger').hide();
		$('#chat-msg-svg').show();
		$('#chat-arrow').hide();
	}
})

$('#chat-submit').click(function (e) {
	e.preventDefault();
	
	const msgerInput = document.querySelector(".msger-input");
	var news = msgerInput.value;
	if(msgerInput.value == "") {
		return 
	}
	msgerInput.value = ""
	const mlanguage = document.querySelector(".languageclass");
	BOT_NAME = "ChatBot";
	PERSON_NAME = "You";
	appendMsg(PERSON_NAME, PERSON_IMG, "right", news);
	toastr.success("ChatBot Answering!");

	$.ajax({ 
		method: 'POST', 
		url: chat_url,    
		dataType: 'JSON',
		data: {
			'news' : news
		},
		success: function(res){
			toastr.success("Chat Success");
			BOT_NAME = 'You';
			PERSON_NAME = 'ChatBot';
			appendMsg(PERSON_NAME, BOT_IMG, "left", res);
		}, 
		error: function(e){  
			console.log(e)
		} 
	});
})

function getDateTimeFormat  (){
	let date = new Date();
	let formattedDate = moment(date).format("YYYY-MM-DD");
	let formattedTime = moment(date).format("HH:mm:ss");
	return formattedDate + " " + formattedTime;
  };

function appendMsg(name, img, side, text) {
	const msgHTML = `
		<div class="msg chat-fade-in">
			<div class="msg-content ${side}-msg">
				<div class="msg-img" style="background-image: url(${img})"></div>
				
				<div class="msg-bubble">
				<div class="msg-info">
				<div class="msg-info-name">${name}</div>
				<div class="msg-info-time">${getDateTimeFormat()}</div>
				</div>
				
				<div class="msg-text">${text}</div>
				</div>
			</div>
		</div>
    `;
	const msgerChat = document.querySelector(".msger-chat");
	msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    msgerChat.scrollTop += 1500;
    setTimeout(() => {
      const messageContainers = document.querySelectorAll(".msg.chat-fade-in");
      messageContainers.forEach((container) => {
        container.classList.add("show");
      });
    }, 100);
}


