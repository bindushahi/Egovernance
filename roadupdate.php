<!--connect file-->
<?php
  include('dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Road Updates</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Additional CSS styles for the update page */
    .carousel {
      width: 50%;
      max-width: 1000px;
      height: 400px;
      margin: 20px auto;
      overflow: hidden;
      position: relative;
      color: #005884;
    }

    .carousel-item {
      display: none;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      animation: fade 5s infinite;
    }

    .carousel-item.active {
      display: block;
    }

    .carousel-item .place-name {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 10px;
    }

    .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    @keyframes fade {
      0% {
        opacity: 0;
      }
      20% {
        opacity: 1;
      }
      80% {
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }

    .update-form {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: #005884;
    }

    .update-form label,
    .update-form input,
    .update-form textarea,
    .update-form button {
      display: block;
      margin-bottom: 15px;
    }

    .update-form textarea {
      height: 100px;
    }

    .update-form button {
      background-color:#cd4747;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    .update-form button:hover {
      background-color:#4CAF50;
    }

    .safety-precautions {
      margin-top: 90px;
      margin-left: 50px;
      margin-right: 50px;

      background-color:#cd4747;

    }

    .safety-precautions h3 {
      font-size: 20px;
      color: #005884;
      font-weight: bold;
      background-color:#f2f2f2;

      margin-bottom: 10px;
    }

    .safety-precautions ul {
      list-style-type: disc;
      margin-left: 50px;
    }
  </style>
</head>

<body>
  <!-- Navigation bar -->
  <div class="header-top">
    <div class="header-top-right">
      <span> ☎ +977-1-5970646, 4211917</span>
      &nbsp;&nbsp;
      <span>📩 Official: info@.gov.np</span>&nbsp;&nbsp;
      <span>| Technical Support: govnp@rsms.gov.np</span>
    </div>
  </div>
  <header class="header">
    <nav class="navbar">
      <div class="navbar-logo">
        <img src="image/n.png" alt="Logo">
      </div>
      <div class="navbar-search">
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
      </div>
      <ul class="navbar-menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="roadupdate.html">Road Condition</a></li>
        <li><a href="login.html">Login</a></li>
      </ul>
      <div class="navbar-flag">
        <img src="image/nepalflag.gif" alt="Nepal Flag">
      </div>
      </nav>
    </header>
   

  <div class="header-news">
    <marquee behavior="scroll" direction="left">News Update: Road condition of Nepal - Construction is going on the road in Bhaktapur.</marquee>
  </div>

  <!-- Road condition carousel -->
  <section class="carousel">
    <div id="road-carousel" class="carousel-item active">
      <div class="place-name">Balkumari</div>
      <img src="image/ro.jpg" alt="Balkumari Road Condition">

    </div>
    <div class="carousel-item">
      <div class="place-name">Bhaktapur</div>
      <img src="image/roo.jpg" alt="Bhaktapur Road Condition">
    </div>
    <div class="carousel-item">
      <div class="place-name">Koteshwor</div>
      <img src="image/r.jpg" alt="Koteshwor Road Condition">
    </div>
    <div class="carousel-item">
      <div class="place-name">Maitighar</div>
      <img src="image/rr.jpg" alt="Maitighar Road Condition">
    </div>
    <!-- Add more carousel items as needed -->
  </section>

  <!-- Update form -->
  <section class="update-form">
    <h2>Submit Road Update</h2>
    <form>
      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <label for="condition">Road Condition:</label>
      <textarea id="condition" name="condition" required></textarea>

      <label for="image">Upload Image:</label>
      <input type="file" id="image" name="image">

      <button type="submit">Submit</button>
    </form>
  </section>

  <!-- Safety precautions -->
  <section class="safety-precautions">

    <h3>Safety Precautions:</h3>
    <ul>
      <li>Observe speed limits and traffic signals.</li>
      <li>Keep a safe distance from the vehicle in front of you.</li>
      <li>Wear seatbelts and ensure all passengers do the same.</li>
      <li>Use indicators and follow proper lane discipline.</li>
      <li>Be cautious of pedestrians and follow pedestrian crossings.</li>
      <li>Avoid using mobile phones while driving.</li>
      <li>Adhere to road signs and instructions given by traffic police.</li>
    </ul>
</section>

  <script>
    // JavaScript code to handle carousel animation
    const carouselItems = document.querySelectorAll('.carousel-item');
    let activeIndex = 0;

    function showCarouselItem(index) {
      carouselItems.forEach(item => item.classList.remove('active'));
      carouselItems[index].classList.add('active');
    }

    function startCarousel() {
      showCarouselItem(activeIndex);
      activeIndex = (activeIndex + 1) % carouselItems.length;
      setTimeout(startCarousel, 5000); // Change slide every 5 seconds
    }

    startCarousel();
  </script>
</body>

</html>
