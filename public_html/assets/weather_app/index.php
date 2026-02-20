<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 450px;
            background: linear-gradient(135deg, #00feba, #5b548a);
            color: #fff;
            border-radius: 20px;
            padding: 40px 35px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .search {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .search input {
            flex: 1;
            border: 0;
            outline: 0;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 15px 20px;
            border-radius: 30px;
            font-size: 16px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .search input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search input:focus {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.02);
        }

        .search button {
            border: 0;
            outline: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .search button:hover {
            background: rgba(255, 255, 255, 0.5);
            transform: scale(1.1);
        }

        .search button:active {
            transform: scale(0.95);
        }

        .search button img {
            width: 20px;
        }

        .error {
            text-align: left;
            margin: 20px 0;
            display: none;
        }

        .error p {
            color: #ff6b6b;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 10px;
            font-size: 14px;
            backdrop-filter: blur(10px);
        }

        .weather {
            display: none;
            margin-top: 30px;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .weather-icon {
            width: 150px;
            margin: 20px auto;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
        }

        .temp {
            font-size: 70px;
            font-weight: 500;
            margin: 10px 0;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        .city {
            font-size: 40px;
            font-weight: 400;
            margin: 10px 0 30px;
        }

        .details {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            margin-top: 40px;
            gap: 20px;
        }

        .col {
            display: flex;
            align-items: center;
            text-align: left;
            gap: 12px;
        }

        .col img {
            width: 40px;
        }

        .col div p:first-child {
            font-size: 28px;
            font-weight: 500;
        }

        .col div p:last-child {
            font-size: 14px;
            opacity: 0.8;
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .card {
                padding: 30px 25px;
                max-width: 100%;
            }

            .search input {
                padding: 12px 18px;
                font-size: 14px;
            }

            .search button {
                width: 45px;
                height: 45px;
            }

            .search button img {
                width: 18px;
            }

            .weather-icon {
                width: 120px;
            }

            .temp {
                font-size: 55px;
            }

            .city {
                font-size: 30px;
                margin: 10px 0 20px;
            }

            .details {
                padding: 0 10px;
                margin-top: 30px;
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .col {
                gap: 10px;
            }

            .col img {
                width: 35px;
            }

            .col div p:first-child {
                font-size: 24px;
            }

            .col div p:last-child {
                font-size: 12px;
            }
        }

        @media (min-width: 481px) and (max-width: 768px) {
            .card {
                max-width: 400px;
            }

            .weather-icon {
                width: 130px;
            }

            .temp {
                font-size: 60px;
            }

            .city {
                font-size: 35px;
            }

            .details {
                padding: 0 15px;
            }

            .col img {
                width: 38px;
            }

            .col div p:first-child {
                font-size: 26px;
            }
        }

        @media (max-width: 360px) {
            .card {
                padding: 25px 20px;
            }

            .temp {
                font-size: 48px;
            }

            .city {
                font-size: 26px;
            }

            .details {
                flex-direction: column;
                gap: 20px;
            }

            .col {
                width: 100%;
                justify-content: center;
            }
        }

        /* Landscape mode adjustments */
        @media (max-height: 600px) and (orientation: landscape) {
            body {
                padding: 10px;
            }

            .card {
                padding: 20px 25px;
            }

            .weather-icon {
                width: 100px;
            }

            .temp {
                font-size: 45px;
                margin: 5px 0;
            }

            .city {
                font-size: 28px;
                margin: 5px 0 15px;
            }

            .details {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="search">
            <input type="text" placeholder="Enter City Name" spellcheck="false">
            <button><img src="images/search.png" alt="Search"></button>
        </div>
        <div class="error">
            <p>Invalid City Name</p>
        </div>
        <div class="weather">
            <img src="images/rain.png" class="weather-icon" alt="Weather Icon">
            <h1 class="temp">22°C</h1>
            <h2 class="city">New York</h2>
            <div class="details">
                <div class="col">
                    <img src="images/humidity.png" alt="Humidity">
                    <div>
                        <p class="humidity">50%</p>
                        <p>Humidity</p>
                    </div>
                </div>
                <div class="col">
                    <img src="images/wind.png" alt="Wind">
                    <div>
                        <p class="wind">15km/h</p>
                        <p>Wind Speed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const apiKey = "104758abb9854df12538ad7b48957cca";
        const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

        const searchBox = document.querySelector(".search input");
        const searchBtn = document.querySelector(".search button");
        const weatherIcon = document.querySelector(".weather-icon");

        async function checkWeather(city) {
            if (!city.trim()) {
                document.querySelector(".error p").textContent = "Please enter a city name";
                document.querySelector(".error").style.display = "block";
                document.querySelector(".weather").style.display = "none";
                return;
            }

            try {
                const response = await fetch(apiUrl + city + `&appid=${apiKey}`);

                if (response.status == 404) {
                    document.querySelector(".error p").textContent = "Invalid City Name";
                    document.querySelector(".error").style.display = "block";
                    document.querySelector(".weather").style.display = "none";
                } else {
                    const data = await response.json();

                    document.querySelector(".city").innerHTML = data.name;
                    document.querySelector(".temp").innerHTML = Math.round(data.main.temp) + "°C";
                    document.querySelector(".humidity").innerHTML = data.main.humidity + "%";
                    document.querySelector(".wind").innerHTML = data.wind.speed + "km/h";

                    const weatherCondition = data.weather[0].main;
                    const weatherIcons = {
                        "Clouds": "images/clouds.png",
                        "Clear": "images/clear.png",
                        "Rain": "images/rain.png",
                        "Drizzle": "images/drizzle.png",
                        "Mist": "images/mist.png",
                        "Snow": "images/snow.png",
                        "Haze": "images/mist.png"
                    };

                    weatherIcon.src = weatherIcons[weatherCondition] || "images/clouds.png";

                    document.querySelector(".weather").style.display = "block";
                    document.querySelector(".error").style.display = "none";
                }
            } catch (error) {
                document.querySelector(".error p").textContent = "Failed to fetch weather data";
                document.querySelector(".error").style.display = "block";
                document.querySelector(".weather").style.display = "none";
            }
        }

        searchBtn.addEventListener("click", () => {
            checkWeather(searchBox.value);
        });

        searchBox.addEventListener("keypress", (e) => {
            if (e.key === "Enter") {
                checkWeather(searchBox.value);
            }
        });
    </script>
</body>

</html>