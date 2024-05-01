Thank You Page - Header - Start

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZFJ18VKBVT"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());



    gtag('config', 'G-ZFJ18VKBVT');
</script>



<!-- Hotjar Tracking Code for Clickfunnel - Libere ton plein potentiel -->
<script>
    (function (h, o, t, j, a, r) {
        h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
        h._hjSettings = { hjid: 3514991, hjsv: 6 };
        a = o.getElementsByTagName('head')[0];
        r = o.createElement('script'); r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>



<style>
    .elCustomHtmlJsCodeWrapper {
        text-align: center;
    }
</style>



<script>
    window.onbeforeunload = function () {
        if (!buttonClicked) {
            return "";
        }
    };



    window.addEventListener("beforeunload", (event) => {
        sendWatchPercentage(email, percentageWatched);
    });
</script>


Thank You Page - End





Thank You Page - Footer - Start

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
        let zapierWebhookUrl = 'https://hooks.zapier.com/hooks/catch/17444845/3qxj3fj/' + '?' + params;
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
        const zapierWebhookUrl = "https://hooks.zapier.com/hooks/catch/17444845/3n1khdm/";



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
    var urlParams = new URLSearchParams(window.location.search);
    var email = urlParams.get("email");



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



    var buttonClicked = false;
    document.getElementById('paymentButton').addEventListener('click', function () {
        buttonClicked = true;
        sendWatchPercentage(email, percentageWatched);
        setTimeout(function () {
            window.location.href = "https://go.franckrocca.com/appel-decouverte-555-vsl";
        }, 2000);
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






Optin Page - Header - Start


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZFJ18VKBVT"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());



    gtag('config', 'G-ZFJ18VKBVT');
</script>



<!-- Hotjar Tracking Code for Clickfunnel - Libere ton plein potentiel -->
<script>
    (function (h, o, t, j, a, r) {
        h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
        h._hjSettings = { hjid: 3514991, hjsv: 6 };
        a = o.getElementsByTagName('head')[0];
        r = o.createElement('script'); r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>





Optin Page - Header - End




Optin Page - Footer - Start


<!-- Get all parameters from URL -->
<script>



    function getParams() {
        let url_params = '';
        let utm_params = location.href.split('?')[1].split('&');
        let first_name = document.querySelector('#modalPopup input[name=first_name]').value;
        let email = document.querySelector('#modalPopup input[name=email]').value;
        for (let utm of utm_params) {
            url_params = url_params + utm + '&';
        }
        url_params = url_params.replace('#open-popup', '');
        url_params = url_params.replace('#submit-form', '');
        url_params = url_params.replace('#exit-form', '');
        console.log('URL_PARAMS sans # : ', url_params);
        return url_params + 'billing_first_name=' + first_name + '&' + 'email=' + encodeURIComponent(email)
    }



    function setLocalStorage(event) {
        let params = getParams();
        localStorage.setItem('my_utm_params', location.href.split('?')[0] + '?' + params);
    }



    document.querySelector('#modalPopup a.elButton').addEventListener('click', setLocalStorage);



    <!-- Pass parameters to thank you page URL -->



    //var parameters = getAllParameters();
    //var thankYouPageUrl = 'https://www.liberetonpleinpotentiel.com/vip-upgrade?' + $.param(parameters);



    // Remove the setTimeout() function
    //setTimeout(function() {
    // window.location.href = thankYouPageUrl;
    //}, 1000);



    // Instead of using setTimeout, we can use the onload event to redirect the user to the thank you page
    // window.onload = function() {
    // Wait until the form has been submitted
    // var form = document.getElementById('cfAR');
    // form.addEventListener('submit', function(event) {
    // Prevent the default action of the form
    // event.preventDefault();



    // Get the values of the form fields
    // var firstName = document.getElementById('firstName').value;
    // var email = document.getElementById('email').value;
    // var phoneNumber = document.getElementById('phoneNumber').value;



    // Send the values of the form fields to Zapier
    // parameters['firstName'] = firstName;
    // parameters['email'] = email;
    // parameters['phoneNumber'] = phoneNumber;



    // $.ajax({
    // type: 'POST',
    // url: zapierWebhookUrl,
    // data: parameters,
    // success: function(response) {
    // Do something with the response
    // },
    // error: function(error) {
    // Handle the error
    // }
    //});



    // Redirect the user to the thank you page
    //window.location.href = thankYouPageUrl;
    // });
    //};
</script>



<!-- The form
<form id="cfAR" method="post">
<input type="text" name="firstName" placeholder="First Name">
<input type="email" name="email" placeholder="Email">
<input type="tel" name="phoneNumber" placeholder="Phone Number">
<input type="submit" value="Submit">
</form>
-->



<script>
    // Les entêtes
    var idsHeadlines = ['#faq-h1-1,#id-6Z-LdPJZz-135'];
    // les paragraphes
    var idsParagraph = ['#faq-content-1,#id-6Z-LdPJZz-136'];



    $('.id-6Z-LdPJZz-129 .elSubheadlineWrapper').hide()



    function clickSurEntete(obj) {
        obj.toggleClass('active');
        var content = obj.next();
        var style = parseInt(content.css('maxHeight').replace('px'));
        var id = content.attr('id').replace('#', '');
        if (obj.hasClass('active')) {
            content.slideDown()
        }
        else {
            content.slideUp()



        }
    }



    $(document).ready(function () {
        jQuery('#button-faq a').click(function () {
            jQuery('div.closeLPModal img').click();
        });
        for (var i = 0; i < idsParagraph.length; i++) {
            $(idsParagraph[i]).toggleClass('content');
        }
        for (var i = 0; i < idsHeadlines.length; i++) {



            $(idsHeadlines[i]).toggleClass('collapsible');
            $(idsHeadlines[i]).click(function () {
                clickSurEntete($(this));
            });
        }
    });
</script>



<!-- Get all parameters from URL -->
<script>
    function getAllParameters() {
        var parameters = {};
        var queryString = window.location.search.slice(1);
        var queryParts = queryString.split('&');
        for (var i = 0; i < queryParts.length; i++) {
            var keyValue = queryParts[i].split('=');
            parameters[keyValue[0]] = keyValue[1];
        }
        return parameters;
    }
</script>



<script id="pap_x2s6df8d" src="https://propulser.postaffiliatepro.com/scripts/jl4d195k" type="text/javascript"></script>
<script type="text/javascript">
    document.querySelectorAll("a[href^='#submit-form']")[0].addEventListener("click", function () { papSale() });



    function papSale() {
        var email = document.getElementsByName('email')[0].value;



        if (email == '') return;



        var sale = PostAffTracker.createAction('optin');
        sale.setProductID('Masterclass');
        sale.setCampaignID('26f2b52f');
        sale.setOrderID(email);
        sale.setData1(email);
        PostAffTracker.register();
    }
</script>



Optin Page - Footer - End