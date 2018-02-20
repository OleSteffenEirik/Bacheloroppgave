/* Script for count ned/ teller ned tiden for time-out */
/*
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var end =setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        //display.textContent = seconds;

        if (--timer < 0) {
            window.location = "../index.php";
            clearInterval(end);
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 120,
        display = document.querySelector('#counter');
    startTimer(fiveMinutes, display);
};
*/


/* Script for count ned/ teller ned tiden for time-out */
const startTimer =(duration, display) => {
    let timer = duration, minutes, seconds;
    let end =setInterval(()=> {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        //display.textContent = seconds;

        if (--timer < 0) {
            window.location = "../index.php";
            clearInterval(end);
        }
    }, 1000);
}


// ES6 sin Arrow-funksjon.
 window.onload = () => {
    let fiveMinutes = 120, display = document.querySelector('#counter'); startTimer(fiveMinutes, display)
};

