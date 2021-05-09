import '../scss/main.scss';
import $ from 'jquery';
import moment from 'moment';

$(document).on('click', '#btnSubmit', (e) => {
	let city = $('#cityCode').val();
	let country = $('#cityCode').val();
	let apiKey = '949cf0ee9b5043cda5709f28c6878ee1';
	let url = `https://api.weatherbit.io/v2.0/forecast/daily?city=${city}&country=${country}&days=8&key=${apiKey}`;
	$.ajax({
		type: 'post',
		data: $('#locationForm').serialize(),
		url: 'filter.php',
		success: function (response) {
			$('#weatherContent').html(response);
			console.log(response);
		},
		error: function (err) {
			console.log(err);
		}
	});
});


setInterval(() => {
	$('#currentTime').html('' + moment(new Date()).format('H:mm A'));
	$('#currentDay').html(moment(new Date()).format('dddd'));
	$('#currentDate').html(moment(new Date()).format('DD-MM-YYYY'));
}, 1000);
