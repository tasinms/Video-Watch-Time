<!-- JS -->
<script>



    <!-- Send parameters to Zapier webhook -->
    function getParams() {
        let url_params = '';
        let utm_params = location.href.split('?')[1].split('&');
        console.log(utm_params);
        for (let utm of utm_params) {
            console.log(utm);
            url_params = url_params + utm + '&';
        }
        console.log('URLPARAMS : ', url_params)



        url_params = url_params.replace('#open-popup', '');
        url_params = url_params.replace('#submit-form', '');
        url_params = url_params.replace('#exit-form', '');
        return url_params;
    }



    function setLocalStorage(event) {
        // 1 on récupere les parametres url
        let params = getParams();
        localStorage.setItem('my_utm_params', location.href.split('?')[0] + '?' + params);



    }



    function sendWebhookToZapier() {



        let utm_params = localStorage.getItem('my_utm_params').split('?')[1];
        if (utm_params != null) {
            history.pushState({}, null, '/ty-vsl?' + utm_params);
            // location.href = location.href +'?'+utm_params;
        }



        // Change link button to franckrocca.com
        let buttons = document.querySelectorAll('a.elButton');
        for (let btn of buttons) {
            btn.href = btn.href + '?' + utm_params;
        }



        let params = getParams();
        let zapierWebhookUrl = 'https://hooks.zapier.com/hooks/catch/18622153/37y2w0t/' + '?' + params;
        // 2 on fait la request à Zapier
        console.log('On fait la request: ', zapierWebhookUrl);
        fetch(zapierWebhookUrl)
            .then(response => console.log(response))
    }



    document.addEventListener('DOMContentLoaded', sendWebhookToZapier)
    document.querySelector('#modalPopup a.elButton').addEventListener('click', setLocalStorage);



</script>

<script src="https://player.vimeo.com/api/player.js"></script>

<script>
    function sendWatchPercentage(email, percentageWatched) {
        const zapierWebhookUrl = "https://hooks.zapier.com/hooks/catch/18622153/3n0kh64/";


        if (percentageWatched < 1) {
            percentageWatched = 0;
        } else if (1 <= percentageWatched && percentageWatched < 10) {
            percentageWatched = 1;
        } else if (10 <= percentageWatched && percentageWatched < 25) {
            percentageWatched = 10;
        } else if (25 <= percentageWatched && percentageWatched <= 50) {
            percentageWatched = 25;
        } else if (50 <= percentageWatched && percentageWatched <= 75) {
            percentageWatched = 50;
        } else if (75 <= percentageWatched && percentageWatched <= 90) {
            percentageWatched = 75;
        } else if (90 <= percentageWatched && percentageWatched <= 99) {
            percentageWatched = 90;
        } else if (percentageWatched > 99) {
            percentageWatched = 100;
        }


        // Data to be sent in the POST request
        const postData = {
            contact: {
                email: email,
                watchPercentage: `${percentageWatched}%`,
            },
        };


        // Configuring the fetch request
        const requestOptions = {
            method: "POST",
            body: JSON.stringify(postData),
        };


        // Sending the POST request
        fetch(zapierWebhookUrl, requestOptions)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                console.log("Success:", data);
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }


    // Retrieve email and full name from URL parameters
    // var urlParams = new URLSearchParams(window.location.search);
    // var email = urlParams.get("email");

    var urlParamsFromLocalStorage = localStorage.getItem('my_utm_params');
    var searchParams = new URLSearchParams(urlParamsFromLocalStorage);
    var email = searchParams.get('email');
    var iframe = document.querySelector("#vimeo-player");
    var player = new Vimeo.Player(iframe);
    var maxWatchedTime = 0;
    var percentageWatched = 0;


    document.addEventListener("DOMContentLoaded", () => {
        console.log('Loaded');
        sendWatchPercentage(email, percentageWatched);
    });


    player.on("timeupdate", function (data) {
        if (data.seconds > maxWatchedTime) {
            maxWatchedTime = data.seconds;
        }


        player.getDuration().then(function (duration) {
            percentageWatched =
                Math.round((maxWatchedTime / duration) * 100 * 100) / 100;
        });


        console.log(`Email: ${email}`);
        console.log(`Watch Percentage: ${percentageWatched}%`);
    });


    let utm_params = localStorage.getItem('my_utm_params').split('?')[1];
    var buttonClicked = false;
    var paymentButtons = document.querySelectorAll('.elButton');
    paymentButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            buttonClicked = true;
            sendWatchPercentage(email, percentageWatched);
            setTimeout(function () {
                window.location.href = "https://go.franckrocca.com/appel-decouverte-555-vsl" + "?" + utm_params;
            }, 2000);
        });
    });


    window.onbeforeunload = function () {
        if (!buttonClicked) {
            return "";
        }
    };


    window.addEventListener("beforeunload", (event) => {
        sendWatchPercentage(email, percentageWatched);
    });


</script>