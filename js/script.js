var btnLogin = document.getElementById('do-login');
var idLogin = document.getElementById('login');
var username = document.getElementById('username');
$('#do-login').click( function(){
  $.ajax({
		method: 'post',
		url: register_post_url,
		data: {
			'user' : $('user').val(),
			'pass' : $('pass').val(),
		},
		dataType: 'json',
		success: function(res) {
			console.log(res);
		},
		error: function(e) {
			console.log(e)
		}
	})
})

$('#do-signup').click(function () {
	$.ajax({
		method: 'post',
		url: register_post_url,
		
		data: {
			'user' : $('#user').val(),
			'pass' : $('#pass').val(),
			'conf' : $('#conf').val()
		},
		dataType: 'json',
		success: function(res) {
			console.log(res);
		},
		error: function(e) {
			console.log(e)
		}
	})
})

