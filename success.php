<!DOCTYPE html>
<html>
<head>
<style>
    body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('https://amazinglanka.com/wp/wp-content/uploads/2015/07/1098746.jpg'); /* Replace 'your-image-url.jpg' with the actual URL of your background image */
            background-size: cover;
            background-repeat: no-repeat;
           }

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: visible;
  opacity: 1;
}
.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
  text-align: center;
}
.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
  z-index: 2; /* Ensure it's clickable */
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}
@media screen and (max-width: 700px) {
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
.image-section {
  position: absolute;
  bottom: 20;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
}

.image-section img {
  margin: 0 10px;
}
</style>
</head>
<body>
  <div id="popup1" class="overlay" style="visibility: visible;">
    <div class="popup">
      <h2>Successful Registration</h2>
      <a class="close" href="#">&times;</a>
      <div class="content">
      You have registered successfully!
      </div>
    </div>
  </div>

  <div class="image-section">
    </div>
</body>
</html>
