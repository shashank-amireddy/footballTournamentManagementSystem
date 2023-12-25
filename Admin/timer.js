function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var intervalId = setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);
  
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;
  
      display.textContent = minutes + ":" + seconds;
  
      if (--timer < 0) {
        clearInterval(intervalId);
        display.textContent = "Time's up!";
      }
    }, 1000);
  
    // Return the interval ID so it can be used to stop the timer
    return intervalId;
  }
  
   function start () {
    var display = document.getElementById("timer");
    var intervalId = startTimer(90 * 60, display); // 90 minutes = 90 * 60 seconds
  
    var stopButton = document.getElementById("stop-button");
    stopButton.addEventListener("click", function() {
      clearInterval(intervalId);
      display.textContent = "Timer stopped";
    });
  };
  
  