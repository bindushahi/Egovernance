<!--connect file-->
<?php
  include('dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Road Updates</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

  <style>
    /* Additional CSS styles for the update page */
    .carousel {
      width: 100%;
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
      <ul class="navbar-menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="roadupdate.php">Road Condition</a></li>
        <li><a href="login.html"><i class="far fa-user"></i></a></li>
      </ul>
      <div class="navbar-flag">
        <img src="image/nepalflag.gif" alt="Nepal Flag">
      </div>
      </nav>
    </header>
   

  <div class="header-news">
    <marquee behavior="scroll" direction="left">News Update: Road condition of Nepal - Construction is going on the road in Bhaktapur.</marquee>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-md-8">
      <!-- Road condition carousel -->
      <?php
      // Fetch images and location names from the roadconditionupdates table
$query = "SELECT road_update_image1, Location FROM roadconditionupdates";
$result = mysqli_query($conn, $query);

// Store the fetched data in an array
$carouselItems = array();
while ($row = mysqli_fetch_assoc($result)) {
    $image = $row['road_update_image1'];
    $location = $row['Location'];

    // Add the image and location to the carousel items array
    $carouselItems[] = array('image' => $image, 'location' => $location);
}
?>

<!-- Display the carousel -->
<div class="carousel">
  <?php foreach ($carouselItems as $item): ?>
    <div class="carousel-item">
      <div class="place-name"><?php echo $item['location']; ?></div>
      <img src="road_update_images/<?php echo $item['image']; ?>" alt="<?php echo $item['location']; ?>">
    </div>
  <?php endforeach; ?>
</div>
      <!--section class="carousel">
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
      <!--/section-->
    </div>
    <div class="col-md-4">
      <!-- Update form -->
      <section class="update-form">
        <h2>Submit Road Update</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="updatelocation">Location*</label>
            <input type="text" id="updatelocation" name="updatelocation" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="roadcondition">Road Condition*</label>
            <textarea id="roadcondition" name="roadcondition" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label for="roadimage1">Upload Image*</label>
            <input type="file" id="roadimage1" name="roadimage1" class="form-control-file" required>
          </div>
          <div class="form-group">
            <label for="updaterepoter">Reporter Name*</label>
            <input type="text" id="updaterepoter" name="updaterepoter" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="updaterepotercontact">Reporter Contact*</label>
            <input type="text" id="updaterepotercontact" name="updaterepotercontact" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="roadimage2">Additional Image</label>
            <input type="file" id="roadimage2" name="roadimage2" class="form-control-file">
          </div><div class="form-group">
            <label for="roadimage3">Additional Image</label>
            <input type="file" id="roadimage3" name="roadimage3" class="form-control-file">
          </div>

          <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_user_report"
                class="btn btn_info mb-3 p-3 bg-info" value="Submit">
            </div>
        </form>
      </section>
    </div>
  </div>
</div>
<?php
if (isset($_POST['insert_user_report'])) {
  // Retrieve form data
    $updatelocation = $_POST['updatelocation'];
    $roadcondition = $_POST['roadcondition'];
    $updaterepoter = $_POST['updaterepoter'];
    $updaterepotercontact = $_POST['updaterepotercontact'];

    // Handle file upload
    $image1 = $_FILES['roadimage1']['name'];
    $image1_tmp = $_FILES['roadimage1']['tmp_name'];

    $image2 = $_FILES['roadimage2']['name'];
    $image2_tmp = $_FILES['roadimage2']['tmp_name'];

    $image3 = $_FILES['roadimage3']['name'];
    $image3_tmp = $_FILES['roadimage3']['tmp_name'];

    // Move uploaded files to a specific folder
    move_uploaded_file($image1_tmp,"user_road_update_images/$image1");
    move_uploaded_file($image2_tmp,"user_road_update_images/$image2");
    move_uploaded_file($image3_tmp,"user_road_update_images/$image3");

    // Prepare and execute the SQL query
    $query = "INSERT INTO roadreport 
    (updatelocation, roadcondition, updaterepoter, updaterepotercontact, roadimage1, roadimage2, roadimage3,created_at)
              VALUES ('$updatelocation', '$roadcondition', '$updaterepoter', '$updaterepotercontact', '$image1', '$image2', '$image3',NOW())";

    $result = mysqli_query($conn, $query);

    if ($result) {
      // Data inserted successfully
      echo "<script>alert('Road report submitted successfully')</script>";
    } else {
      // Error inserting data
      echo "Error: " . mysqli_error($con);
    }
    
  }
?>


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
