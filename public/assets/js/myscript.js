

function logout() {
    alert('Do you want to logout');
  }

  function start(){
    var countdownEndTime = new Date();
    countdownEndTime.setMinutes(countdownEndTime.getMinutes()+15); 
    
    setInterval(function() {
        var now = new Date().getTime();
        var timeRemaining = countdownEndTime.getTime() - now;
        if (timeRemaining <= 0) {
          document.getElementById('countdown-timer').innerHTML = 'Time is up!';
          clearInterval(countdownInterval);
          return;
      }
        var hours = Math.floor(timeRemaining / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
        var timeRemainingString = hours.toString().padStart(2, '0') + ':' +
                                  minutes.toString().padStart(2, '0') + ':' +
                                  seconds.toString().padStart(2, '0');
        document.getElementById('countdown-timer').innerHTML = timeRemainingString;
    }, 1000);
  }
  

