$(document).ready(function() {
	navigator.geolocation.getCurrentPosition(success, error);

	function success(pos){
		var lat = pos.coords.latitude;
		var long = pos.coords.longitude;
		weather(lat, long);

	}

	function error() {
		console.log("C'est une erreur");
	}

	function weather(lat, long){
		var URL = 'https://fcc-weather-api.glitch.me/api/current?lat=${lat}$lon=${long}';
		$.getJSON(URL, function(data){
			display(data);
		});
	}

	  function display(data) {
    var city = data.name.toUpperCase();
    var temp =
      Math.round(data.main.temp_max) +
      "&deg; C | " +
      Math.round(Math.round(data.main.temp_max) * 1.8 + 32) +
      "&deg; F";
    var desc = data.weather[0].description;
    var date = new Date();

    var months = [
      "Janvier",
      "Février",
      "Mars",
      "Avril",
      "Mai",
      "Juin",
      "Juillet",
      "Aout",
      "Septembre",
      "Octobre",
      "Novembre",
      "Decembre"
    ];

    var weekday = new Array(7);
    weekday[0] = "Decembre";
    weekday[1] = "Lundi";
    weekday[2] = "Mardi";
    weekday[3] = "Mercredi";
    weekday[4] = "Jeudi";
    weekday[5] = "Vendredi";
    weekday[6] = "Samedi";

    var font_color;
    var bg_color;
    if (Math.round(data.main.temp_max) > 25) {
      font_color = "#d36326";
      bg_color = "#f3f5d2";
    } else {
      font_color = "#44c3de";
      bg_color = "#eff3f9";
    }

    if (data.weather[0].main == "Sunny" || data.weather[0].main == "sunny") {
      $(".weathercon").html(
        "<i class='fas fa-sun' style='color: #d36326;'></i>"
      );
    } else {
      $(".weathercon").html(
        "<i class='fas fa-cloud' style='color: #44c3de;'></i>"
      );
    }

    var minutes =
      date.getMinutes() < 11 ? "0" + date.getMinutes() : date.getMinutes();
    var date =
      weekday[date.getDay()].toUpperCase() +
      " | " +
      months[date.getMonth()].toUpperCase().substring(0, 3) +
      " " +
      date.getDate() +
      " | " +
      date.getHours() +
      ":" +
      minutes;
    $(".location").html(city);
    $(".temp").html(temp);
    $(".date1").html(date1);
    $(".box").css("background", bg_color);
    $(".location").css("color", font_color);
    $(".temp").css("color", font_color);
  }

}):