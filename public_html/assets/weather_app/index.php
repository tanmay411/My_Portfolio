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

        /* Search wrapper for positioning the dropdown */
        .search-wrapper {
            position: relative;
            width: 100%;
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
            flex-shrink: 0;
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

        /* ── AUTOCOMPLETE DROPDOWN ── */
        .suggestions-list {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 60px;
            /* align with the input width (leave room for button) */
            background: rgba(30, 20, 60, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
            z-index: 100;
            animation: dropDown 0.2s ease;
        }

        @keyframes dropDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .suggestions-list.active {
            display: block;
        }

        .suggestion-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            cursor: pointer;
            transition: background 0.2s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            text-align: left;
        }

        .suggestion-item:last-child {
            border-bottom: none;
        }

        .suggestion-item:hover,
        .suggestion-item.highlighted {
            background: rgba(255, 255, 255, 0.15);
        }

        .suggestion-flag {
            font-size: 22px;
            line-height: 1;
            flex-shrink: 0;
        }

        .suggestion-text {
            display: flex;
            flex-direction: column;
        }

        .suggestion-city {
            font-size: 15px;
            font-weight: 600;
            color: #fff;
        }

        .suggestion-country {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 2px;
        }

        .suggestion-loading {
            padding: 14px 18px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            text-align: center;
            letter-spacing: 0.5px;
        }

        /* ── ERROR & WEATHER ── */
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

        /* ── RESPONSIVE ── */
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

            .col img {
                width: 35px;
            }

            .col div p:first-child {
                font-size: 24px;
            }

            .col div p:last-child {
                font-size: 12px;
            }

            .suggestions-list {
                right: 55px;
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
    </style>
</head>

<body>

    <div class="card">
        <div class="search-wrapper">
            <div class="search">
                <input type="text" placeholder="Enter City Name" spellcheck="false" autocomplete="off">
                <button><img src="images/search.png" alt="Search"></button>
            </div>

            <!-- Autocomplete Dropdown -->
            <div class="suggestions-list" id="suggestionsList"></div>
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
        const geoUrl = "https://api.openweathermap.org/geo/1.0/direct?limit=5&appid=" + apiKey + "&q=";

        const searchBox = document.querySelector(".search input");
        const searchBtn = document.querySelector(".search button");
        const weatherIcon = document.querySelector(".weather-icon");
        const suggList = document.getElementById("suggestionsList");

        let debounceTimer = null;
        let highlightIndex = -1;
        let suggestions = [];

        /* ── Country code → flag emoji ── */
        function countryFlag(code) {
            if (!code) return "🌍";
            return code.toUpperCase().replace(/./g, c =>
                String.fromCodePoint(127397 + c.charCodeAt(0))
            );
        }

        /* ── Fetch city suggestions ── */
        async function fetchSuggestions(query) {
            if (!query.trim() || query.trim().length < 2) {
                hideSuggestions();
                return;
            }

            suggList.innerHTML = `<div class="suggestion-loading">Searching…</div>`;
            suggList.classList.add("active");

            try {
                const res = await fetch(geoUrl + encodeURIComponent(query));
                const data = await res.json();

                if (!data.length) {
                    suggList.innerHTML = `<div class="suggestion-loading">No cities found</div>`;
                    return;
                }

                suggestions = data;
                highlightIndex = -1;
                renderSuggestions(data);
            } catch (e) {
                suggList.innerHTML = `<div class="suggestion-loading">Could not load suggestions</div>`;
            }
        }

        /* ── Render suggestion items ── */
        function renderSuggestions(cities) {
            suggList.innerHTML = cities.map((city, i) => {
                const statePart = city.state ? `${city.state}, ` : "";
                return `
                    <div class="suggestion-item" data-index="${i}">
                        <span class="suggestion-flag">${countryFlag(city.country)}</span>
                        <div class="suggestion-text">
                            <span class="suggestion-city">${city.name}</span>
                            <span class="suggestion-country">${statePart}${city.country}</span>
                        </div>
                    </div>`;
            }).join("");

            /* click on a suggestion */
            suggList.querySelectorAll(".suggestion-item").forEach(item => {
                item.addEventListener("mousedown", (e) => {
                    e.preventDefault(); // don't trigger input blur first
                    const idx = parseInt(item.dataset.index);
                    selectSuggestion(idx);
                });
            });
        }

        /* ── Select a suggestion ── */
        function selectSuggestion(idx) {
            const city = suggestions[idx];
            searchBox.value = city.name;
            hideSuggestions();
            checkWeather(city.name);
        }

        /* ── Hide dropdown ── */
        function hideSuggestions() {
            suggList.classList.remove("active");
            suggList.innerHTML = "";
            suggestions = [];
            highlightIndex = -1;
        }

        /* ── Keyboard navigation ── */
        searchBox.addEventListener("keydown", (e) => {
            const items = suggList.querySelectorAll(".suggestion-item");

            if (e.key === "ArrowDown") {
                e.preventDefault();
                highlightIndex = Math.min(highlightIndex + 1, items.length - 1);
                updateHighlight(items);
            } else if (e.key === "ArrowUp") {
                e.preventDefault();
                highlightIndex = Math.max(highlightIndex - 1, -1);
                updateHighlight(items);
            } else if (e.key === "Enter") {
                if (highlightIndex >= 0 && items[highlightIndex]) {
                    e.preventDefault();
                    selectSuggestion(highlightIndex);
                } else {
                    hideSuggestions();
                    checkWeather(searchBox.value);
                }
            } else if (e.key === "Escape") {
                hideSuggestions();
            }
        });

        function updateHighlight(items) {
            items.forEach((item, i) => {
                item.classList.toggle("highlighted", i === highlightIndex);
            });
        }

        /* ── Debounced input ── */
        searchBox.addEventListener("input", () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                fetchSuggestions(searchBox.value);
            }, 300);
        });

        /* Hide on outside click */
        document.addEventListener("click", (e) => {
            if (!e.target.closest(".search-wrapper")) hideSuggestions();
        });

        /* ── Fetch weather ── */
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
            hideSuggestions();
            checkWeather(searchBox.value);
        });
    </script>
</body>

</html>