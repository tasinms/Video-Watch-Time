var iframe = document.querySelector("#vimeo-player");
var player = new Vimeo.Player(iframe);
var maxWatchedTime = 0;

player.on("timeupdate", function (data) {
  if (data.seconds > maxWatchedTime) {
    maxWatchedTime = data.seconds;
  }
  var minutes = Math.floor(maxWatchedTime / 60);
  var seconds = Math.floor(maxWatchedTime % 60);

  // Retrieve email from local storage
  var email = localStorage.getItem("email");

  console.log(
    "Email: " +
      email +
      "\nWatch Time: " +
      minutes +
      " minutes " +
      seconds +
      " seconds"
  );
});

// More Secure Way to Store Email

// document.getElementById("myForm").addEventListener("submit", function (event) {
//   event.preventDefault(); // Prevent the form from submitting normally

//   var email = document.getElementById("email").value;

//   console.log("Email: " + email);

//   // Send email to server
//   fetch("https://your-server.com/api/save-email", {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/json",
//     },
//     body: JSON.stringify({ email: email }),
//   })
//     .then((response) => response.json())
//     .then((data) => {
//       // Handle response from server
//       console.log(data);
//     })
//     .catch((error) => {
//       console.error("Error:", error);
//     });

//   // Redirect to video.html
//   window.location.href = "video.html";
// });
