document.getElementById("myForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent the form from submitting normally

  var email = document.getElementById("email").value;

  console.log("Email: " + email);

  // Store email in local storage
  localStorage.setItem("email", email);

  // Redirect to video.html
  window.location.href = "video.html";
});
