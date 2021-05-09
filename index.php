<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="assets/build/css/main.css" />
</head>

<body>
    <div class="app_container">
        <div class="app_wrapper">
            <div class="title_wrapper">
                <h1>Weather Forecast App</h1>
            </div>
            <div class="form_wrapper">
                <form id="locationForm" class="row" action="" method="post">
                    <div class="select_wrapper">
                        <select id="countryCode" class="col" name="country" label="select">
                            <?php
                            require_once('./components/country_options.php')
                            ?>
                        </select>
                    </div>
                    <div class="input_wrapper">
                        <input id="cityCode" class="col" type="text" class="text" placeholder="Enter city name" name="city" value="" />
                    </div>
                    <div class="col btn_wrapper">
                        <button id="btnSubmit" type="button" name="submit" class="submit">Submit</button>
                    </div>

                    <!-- <?php echo $msg ?> -->
                </form>
            </div>
            <div id="weatherContent" class="weatherContent">
            </div>
        </div>

    </div>
</body>
<script src="assets/build/js/main.js"></script>

</html>