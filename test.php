<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>JS + CSS Clock</title>
    <style>html {
        background: #000;
        background-size: cover;
        font-family: "helvetica neue";
        text-align: center;
        font-size: 10px;
      }

      body {
        margin: 0;
        font-size: 2rem;
        display: flex;
        flex: 1;
        min-height: 100vh;
        align-items: center;
      }

      .clock {
        width: 35rem;
        height: 35rem;
        border-radius: 50%;
        margin: 50px auto;
        position: relative;
        background-color: #fff;
        padding: 2rem;
        box-shadow: 0 0 20px #444;
        position: relative;
        background-image: url('https://i.ibb.co/4SDZSL4/clock.jpg');
        background-position: center;
        background-size: cover;
      }
      .clock::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        width: 3%;
        height: 3%;
        background-color: #000;
        border-radius: 50%;
      }

      .clock-face {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 100%;
        height: 100%;
      }
      .hand {
        width: 50%;
        height: 6px;
        background: black;
        position: absolute;
        transform-origin: 50% 100%;
      }
      .hour-hand {
        width: 3px;
        height: 0;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        border-bottom: 100px solid black;
        background-color: transparent;
        top: 21%;
      }
      .min-hand {
        width: 3px;
        height: 0;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        border-bottom: 180px solid black;
        background-color: transparent;
        left: 48%;
        top: -1.5%;
      }
      
      .second-hand {
        width: 1px;
        height: 0;
        border-left: 1px solid transparent;
        border-right: 1px solid transparent;
        border-bottom: 180px solid black;
        background-color: transparent;
        top: -1%;
        left: 50%;
      }</style>
  </head>
  <body>
    <div class="clock">
      <div class="clock-face">
        <div class="hand hour-hand"></div>
        <div class="hand min-hand"></div>
        <div class="hand second-hand"></div>
        <button id="start-button">Start</button>
<button id="stop-button">Stop</button>

      </div>
    </div>
    <script>
let hr_hand = document.querySelector(".hour-hand");
let min_hand = document.querySelector(".min-hand");
let sec_hand = document.querySelector(".second-hand");
let startButton = document.getElementById("start-button");
let stopButton = document.getElementById("stop-button");
let intervalId = null;
let secondsElapsed = 0;
const SECONDS_IN_DAY = 86400;

function clock() {
  const date = new Date();
  let hr_cal = (date.getHours() * 30) + (date.getMinutes() / 2);
  let min_cal = (date.getMinutes() * 6);
  let sec_cal = date.getSeconds() * 6;

  hr_hand.style.transform = `rotate(${hr_cal}deg)`;
  min_hand.style.transform = `rotate(${min_cal}deg)`;
  sec_hand.style.transform = `rotate(${sec_cal}deg)`;

  secondsElapsed++;

  if (secondsElapsed >= SECONDS_IN_DAY) {
    stopClock();
  }
}

function startClock() {
  intervalId = setInterval(clock, 1000);
  startButton.disabled = true;
  stopButton.disabled = false;
}

function stopClock() {
  clearInterval(intervalId);
  startButton.disabled = false;
  stopButton.disabled = true;
  secondsElapsed = 0;
}

startButton.addEventListener("click", startClock);
stopButton.addEventListener("click", stopClock);




      </script>
  </body>
</html> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>JS + CSS Clock</title>
    <style>html {
        background: #000;
        background-size: cover;
        font-family: "helvetica neue";
        text-align: center;
        font-size: 10px;
      }

      body {
        margin: 0;
        font-size: 2rem;
        display: flex;
        flex: 1;
        min-height: 100vh;
        align-items: center;
      }

      .clock {
        width: 35rem;
        height: 35rem;
        border-radius: 50%;
        margin: 50px auto;
        position: relative;
        background-color: #fff;
        padding: 2rem;
        box-shadow: 0 0 20px #444;
        position: relative;
        background-image: url('https://i.ibb.co/4SDZSL4/clock.jpg');
        background-position: center;
        background-size: cover;
      }
      .clock::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        width: 3%;
        height: 3%;
        background-color: #000;
        border-radius: 50%;
      }

      .clock-face {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 100%;
        height: 100%;
      }
      .hand {
        width: 50%;
        height: 6px;
        background: black;
        position: absolute;
        transform-origin: 50% 100%;
      }
      .hour-hand {
        width: 3px;
        height: 0;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        border-bottom: 100px solid black;
        background-color: transparent;
        top: 21%;
      }
      .min-hand {
        width: 3px;
        height: 0;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        border-bottom: 180px solid black;
        background-color: transparent;
        left: 48%;
        top: -1.5%;
      }
      
      .second-hand {
        width: 1px;
        height: 0;
        border-left: 1px solid transparent;
        border-right: 1px solid transparent;
        border-bottom: 180px solid black;
        background-color: transparent;
        top: -1%;
        left: 50%;
      }

      .percentage {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 2rem;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="clock">
      <div class="clock-face">
        <div class="hand hour-hand"></div>
        <div class="hand min-hand"></div>
        <div class="hand second-hand"></div>
        <div class="percentage" style="color:red;"></div>
      </div>
    </div>
    <script>
const clock = document.querySelector('.clock');
const hr_hand = document.querySelector('.hour-hand');
const min_hand = document.querySelector('.min-hand');
const sec_hand = document.querySelector('.second-hand');
const percentage = document.querySelector('.percentage');

function clockTick() {
  const date = new Date();
  let hr_cal = (date.getHours() * 30) + (date.getMinutes() / 2);
  let min_cal = (date.getMinutes() * 6);
  let sec_cal = date.getSeconds() * 6;

  hr_hand.style.transform = `rotate(${hr_cal}deg)`;
  min_hand.style.transform = `rotate(${min_cal}deg)`;
  sec_hand.style.transform = `rotate(${sec_cal}deg)`;

  let minutesPerDegree = 1440 / 360;
  let minutesPassed = hr_cal * minutesPerDegree;
  let percentageComplete = minutesPassed / 1440 * 100;
  percentage.innerText = percentageComplete.toFixed(2) + '%';

  setTimeout(clockTick, 1000);
}

hr_hand.style.transform = 'rotate(0deg)';
min_hand.style.transform = 'rotate(0deg)';
sec_hand.style.transform = 'rotate(0deg)';
percentage.innerText = '0.00%';

setTimeout(clockTick, 1000);

</script>