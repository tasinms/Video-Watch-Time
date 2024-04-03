// Retrieve email and full name from URL parameters
var urlParams = new URLSearchParams(window.location.search);
var email = urlParams.get('email');

var iframe = document.querySelector("#vimeo-player");
var player = new Vimeo.Player(iframe);
var maxWatchedTime = 0;

player.on("timeupdate", function (data) {
  if (data.seconds > maxWatchedTime) {
    maxWatchedTime = data.seconds;
  }
  var minutes = Math.floor(maxWatchedTime / 60);
  var seconds = Math.floor(maxWatchedTime % 60);

  console.log(
      email +
      "\nWatch Time: " +
      minutes +
      " minutes " +
      seconds +
      " seconds"
  );
});

player.on('pause', function() {
  const zapierWebhookUrl = "https://hooks.zapier.com/hooks/catch/18433711/3pd7xfj/";

  // Convert maxWatchedTime to minutes
  var watchTime = Math.floor(maxWatchedTime / 60) + " minutes " + Math.floor(maxWatchedTime % 60) + " seconds";

  // Data to be sent in the POST request
  const postData = {
    contact: {
      email: email,
      watchTime: watchTime,
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
});
