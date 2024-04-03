var iframe = document.querySelector("#vimeo-player");
var player = new Vimeo.Player(iframe);
var maxWatchedTime = 0;

player.on("timeupdate", function (data) {
  if (data.seconds > maxWatchedTime) {
    maxWatchedTime = data.seconds;
  }
  var minutes = Math.floor(maxWatchedTime / 60);
  var seconds = Math.floor(maxWatchedTime % 60);

  // Retrieve email and full name from local storage
  var fullName = localStorage.getItem("fullname");
  var email = localStorage.getItem("email");

  console.log(
    "Full Name: " +
      fullName +
      "\nEmail: " +
      email +
      "\nWatch Time: " +
      minutes +
      " minutes " +
      seconds +
      " seconds"
  );
});

const options = {
  method: "POST",
  headers: {
    accept: "application/json",
    "content-type": "application/json",
    "Api-Token":
      "0e3f356ad90875fbcae7b3f123ec8226cd0de5862685e3a580d508162e4997c27a7f564e",
  },
  body: JSON.stringify({
    contact: { email: "tasin2610@gmail.com" },
  }),
};

fetch("https://tasinmsbd.activehosted.com/api/3/contacts", options)
  .then((response) => response.json())
  .then((response) => console.log(response))
  .catch((err) => console.error(err));
