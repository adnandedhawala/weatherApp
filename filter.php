<?php
$status = false;
$city = $_POST['city'];
$country = $_POST['country'];
$apiKey = '949cf0ee9b5043cda5709f28c6878ee1';
$url = "https://api.weatherbit.io/v2.0/forecast/daily?city=$city&country=$country&days=8&key=$apiKey";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
?>
<?php
if (empty($result)) {
?>
 <h1 class="error_msg">
  Please check city and selected country!
 </h1>
<?php } ?>

<?php
if (array_key_exists('error', $result)) {
?>
 <h1 class="error_msg">
  Please enter a valid city!
 </h1>
<?php } ?>

<?php
if (array_key_exists('data', $result)) {
 $weather_array = $result['data'];
 $weather_today = $weather_array[0];
 $weather_today_icon_code = $weather_today['weather']['icon'];
?>

 <div class="weather_main_wrapper">
  <div class="location_info_wrapper">
   <div class="calendar_icon_wrapper">
    <h1><?php echo ($result['city_name']) ?></h1>
   </div>
   <div class="date_wrapper">
    <div class="date">
     <h1 id='currentDay'></h1>
     <h3 id='currentDate'></h3>
    </div>
    <div class="time_wrapper">
     <h1 id='currentTime'></h1>
    </div>
   </div>
  </div>
  <div class="weather_info_wrapper">
   <div class="weatherIcon">
    <img src="<?php echo ("https://www.weatherbit.io/static/img/icons/$weather_today_icon_code.png") ?>" />
   </div>
   <div class="weatherInfo">
    <div class="temperature">
     <div class="temperature_info">
      <h4 class="label">max</h4>
      <h2><?php echo ($weather_today['max_temp'] . " °C") ?></h2>
     </div>
    </div>
    <div class="temperature">
     <div class="temperature_info">
      <h4 class="label">min</h4>
      <h2><?php echo ($weather_today['min_temp'] . " °C") ?></h2>
     </div>
    </div>
    <!-- <div class="description mr45">
     <div class="weatherCondition"><?php echo $weather_today['weather']['description'] ?></div>
    </div> -->
   </div>
  </div>
 </div>
 <div class="weather_future_wrapper">
  <div class="future_tile_row">
   <?php
   for ($i = 1; $i < count($weather_array); $i++) {
    $weather_tile = $weather_array[$i];
    $weather_tile_icon_code =  $weather_tile['weather']['icon'];
    $timestamp = strtotime($weather_tile['datetime']);
    $weather_tile_day = date('l', $timestamp);
    $weather_tile_date = date('d-m-Y', $timestamp);
   ?>
    <div class="future_tile_column">
     <h2><?php echo $weather_tile_day ?></h2>
     <h3><?php echo $weather_tile_date ?></h3>
     <img src="<?php echo ("https://www.weatherbit.io/static/img/icons/$weather_tile_icon_code.png") ?>" />
     <h3><?php echo ($weather_tile['max_temp'] . " °C") ?></h3>
    </div>
   <?php } ?>
  </div>
 </div>

<?php } ?>