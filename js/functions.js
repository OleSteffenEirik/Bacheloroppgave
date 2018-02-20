/* Script for count ned/ teller ned tiden for time-out */
function startTimer(duration, display) {
    let timer = duration, minutes, seconds;
    let end =setInterval(function () {
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
    const fiveMinutes = 120,
        display = document.querySelector('#counter');
    startTimer(fiveMinutes, display);
};

