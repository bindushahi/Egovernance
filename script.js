// JavaScript code

// Function to handle the click event on the "Login" button
function handleLogin() {
  // Perform login logic here
  alert("Login functionality is coming soon!");
}

// Function to handle the click event on the "Sign Up" button
function handleSignUp() {
  // Perform sign up logic here
  alert("Sign Up functionality is coming soon!");
}

// Function to handle the click event on the "Submit Feedback" button
function handleSubmitFeedback() {
  // Get the feedback message entered by the user
  var feedback = document.getElementById("feedback-input").value;

  // Display a thank you message
  alert("Thank you for your feedback!");

  // Clear the feedback input field
  document.getElementById("feedback-input").value = "";
}

// Function to handle the click event on the "Report Accident" button
function handleReportAccident() {
  // Perform accident reporting logic here
  alert("Accident reporting functionality is coming soon!");
}

// Function to handle the click event on the "Check Road Conditions" button
function handleCheckRoadConditions() {
  // Perform road condition checking logic here
  alert("Road condition checking functionality is coming soon!");
}

// Function to handle the click event on the "Get Weather Alerts" button
function handleGetWeatherAlerts() {
  // Perform weather alerts logic here
  alert("Weather alerts functionality is coming soon!");
}

// Function to handle the click event on the "Emergency Assistance" button
function handleEmergencyAssistance() {
  // Perform emergency assistance logic here
  alert("Emergency assistance functionality is coming soon!");
}
// JavaScript code
let slides = document.querySelectorAll(".slide");
let currentSlide = 0;

function showSlide(n) {
  // Hide all slides
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  // Show the selected slide
  slides[n].style.display = "block";
}

function nextSlide() {
  currentSlide++;
  if (currentSlide >= slides.length) {
    currentSlide = 0;
  }
  showSlide(currentSlide);
}

function previousSlide() {
  currentSlide--;
  if (currentSlide < 0) {
    currentSlide = slides.length - 1;
  }
  showSlide(currentSlide);
}

// Show the initial slide
showSlide(currentSlide);

// Add event listeners for next and previous buttons
document.getElementById("next-btn").addEventListener("click", nextSlide);
document.getElementById("prev-btn").addEventListener("click", previousSlide);
