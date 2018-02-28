<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Tittel samt ikon -->
        <title>Tronrud</title>
        <link rel="shortcut icon" href="img/tronrud-icon.png"/>
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
        <!-- Fontawesome 5 -->
        <link rel="stylesheet" type="text/css" href="static/fontawesome/on-server/css/fontawesome-all.min.css"/>
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="../Sass/main.css"/>
    </head>

    <body class="text-center">
        <section class="jumbotron m-0 text-center rounded">
        <img class="mx-auto d-block" src="../img/tronrud-engineering-logo-svart.svg" alt="" width="240" height="120">
            <div class="container">
            <h1 class="display-4">Oh no! You've failed to log in multiple times now, and for that we have to punish you!</h1>
            <img class="mx-auto d-block my-5" src="../img/GoToJail.png" alt="" width="350" height="400">
            <h3>
            Release in:
            <small class="text-muted"><span id="counter">02:00</span> minute(s).</small>
            </h3>
            <p>
                <!--<a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
            </p>
            </div>
        </section>

        <!-- Script -->
        <script>
            /* Script for count down/ teller ned tiden for time-out */
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
        </script>
        <!-- Script -->
    </body>
</html>