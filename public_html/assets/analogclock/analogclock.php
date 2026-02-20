<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Analog Clock</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #222;
      margin: 0;
      color: #fff;
    }

    /* ── Clock face ── */
    .clock {
      position: relative;
      width: min(80vw, 80vh);
      height: min(80vw, 80vh);
      border: 10px solid #fff;
      border-radius: 50%;
      background: #111;
    }

    /* ── Numbers ── */
    .number {
      position: absolute;
      font-size: clamp(12px, 3.5vmin, 28px);
      font-weight: bold;
      transform: translate(-50%, -50%);
    }

    .n12 {
      top: 8%;
      left: 50%;
    }

    .n1 {
      top: 16%;
      left: 73%;
    }

    .n2 {
      top: 30%;
      left: 84%;
    }

    .n3 {
      top: 50%;
      left: 90%;
    }

    .n4 {
      top: 70%;
      left: 84%;
    }

    .n5 {
      top: 84%;
      left: 73%;
    }

    .n6 {
      top: 92%;
      left: 50%;
    }

    .n7 {
      top: 84%;
      left: 27%;
    }

    .n8 {
      top: 70%;
      left: 16%;
    }

    .n9 {
      top: 50%;
      left: 10%;
    }

    .n10 {
      top: 30%;
      left: 16%;
    }

    .n11 {
      top: 16%;
      left: 27%;
    }

    /* ── Hands ──
       transform-origin: bottom center → pivot at the hand's bottom edge.
       Position each hand so its bottom sits exactly at the clock center (50%, 50%).
       i.e.  top = 50% - height%   left = 50%
    ── */
    .hand {
      position: absolute;
      left: 50%;
      transform-origin: bottom center;
      border-radius: 6px;
      transform: translateX(-50%);
    }

    .hour {
      width: clamp(5px, 1.2vmin, 10px);
      height: 28%;
      top: 22%;
      /* 50% - 28% = 22% */
      background: #fff;
      z-index: 3;
    }

    .minute {
      width: clamp(3px, 0.9vmin, 7px);
      height: 36%;
      top: 14%;
      /* 50% - 36% = 14% */
      background: #0ff;
      z-index: 2;
    }

    .second {
      width: clamp(1px, 0.5vmin, 3px);
      height: 42%;
      top: 8%;
      /* 50% - 42% = 8% */
      background: #f00;
      z-index: 1;
    }

    /* ── Center dot ── */
    .center {
      position: absolute;
      width: clamp(10px, 2vmin, 22px);
      height: clamp(10px, 2vmin, 22px);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      border-radius: 50%;
      z-index: 10;
    }

    /* ── Brand ── */
    .brand {
      position: absolute;
      top: 62%;
      left: 50%;
      transform: translateX(-50%);
      font-family: "Trebuchet MS", sans-serif;
      font-size: clamp(12px, 2.5vmin, 28px);
      font-weight: bold;
      color: #0ff;
      letter-spacing: 2px;
      white-space: nowrap;
    }
  </style>
</head>

<body>
  <div class="clock">
    <div class="number n12">12</div>
    <div class="number n1">1</div>
    <div class="number n2">2</div>
    <div class="number n3">3</div>
    <div class="number n4">4</div>
    <div class="number n5">5</div>
    <div class="number n6">6</div>
    <div class="number n7">7</div>
    <div class="number n8">8</div>
    <div class="number n9">9</div>
    <div class="number n10">10</div>
    <div class="number n11">11</div>

    <div class="hand hour" id="hour"></div>
    <div class="hand minute" id="minute"></div>
    <div class="hand second" id="second"></div>

    <div class="center"></div>
    <div class="brand">Tanmay</div>
  </div>

  <script>
    function updateClock() {
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();
      const seconds = now.getSeconds();

      const secondDeg = seconds * 6;
      const minuteDeg = minutes * 6;
      const hourDeg = (hours % 12) * 30 + minutes * 0.5;

      document.getElementById("hour").style.transform = `translateX(-50%) rotate(${hourDeg}deg)`;
      document.getElementById("minute").style.transform = `translateX(-50%) rotate(${minuteDeg}deg)`;
      document.getElementById("second").style.transform = `translateX(-50%) rotate(${secondDeg}deg)`;
    }

    setInterval(updateClock, 1000);
    updateClock();
  </script>
</body>

</html>