<!DOCTYPE html>
<html>
<head>
  <title>Profil Discord</title>
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #36393F;
      color: #fff;
      margin: 0;
      padding: 0;
      
     
    }
    .profile {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 200px;
    }
    .profile-image {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 2px solid #fff;
      margin-bottom: 20px;
      background-color: #7289DA;
      overflow: hidden;
    }
    .profile-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .profile-info {
      text-align: center;
    }
    .profile-info h2 {
      margin: 0;
      margin-bottom: 5px;
      font-size: 20px;
      color: #000 ;
      font-weight: bold;
    }
    .profile-info p {
      margin: 0;
      color: #000 ;
      font-size: 14px;
      font-weight: bold;
    }
    .profile-actions {
      margin-top: 10px;
    }
    .profile-actions input[type="file"] {
      display: none;
    }
    .profile-actions label {
      background-color: #7289DA;
      color: #fff;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
    .profile-actions label:hover {
      background-color: #677BC4;
    }
  </style>
 
</head>
<body>
  <?php
    function getProfileData() {
      // Establish database connection and retrieve data
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "new";

      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT NamaLengkap, Alamat FROM Profile";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $namaLengkap = $row["NamaLengkap"];
        $alamat = $row["Alamat"];
      } else {
        $namaLengkap = "Nama Pengguna Tidak Ditemukan";
        $alamat = "Alamat Tidak Ditemukan";
      }

      $conn->close();

      return [
        'namaLengkap' => $namaLengkap,
        'alamat' => $alamat
      ];
    }

    function updateProfileData($namaLengkap, $alamat) {
      // Establish database connection and update data
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "new";

      $conn = new mysqli($servername, $username, $password, $database);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "UPDATE Profile SET NamaLengkap='$namaLengkap', Alamat='$alamat'";
      $result = $conn->query($sql);

      $conn->close();

      if ($result === TRUE) {
        return true;
      } else {
        return false;
      }
    }

    $profileData = getProfileData();
    $namaLengkap = $profileData['namaLengkap'];
    $alamat = $profileData['alamat'];

    // Update profile data if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $newNamaLengkap = $_POST['namaLengkap'];
      $newAlamat = $_POST['alamat'];

      $updateResult = updateProfileData($newNamaLengkap, $newAlamat);

      // Display success or error message
      if ($updateResult) {
        echo '<p>Profile data has been updated successfully!</p>';
      } else {
        echo '<p>Failed to update profile data.</p>';
      }

      // Refresh the profile data
      $profileData = getProfileData();
      $namaLengkap = $profileData['namaLengkap'];
      $alamat = $profileData['alamat'];
    }
  ?>

  <div class="profile">
    <div class="profile-image">
      <img id="preview" src="default-avatar.png" alt="Profil Gambar">
    </div>
    <div class="profile-info">
  <h2 id="namaPengguna"><?= $namaLengkap ?></h2>
  <p id="alamat"><?= $alamat ?></p>
  <div class="profile-actions">
    <form method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
      <label for="namaLengkap">Nama Pengguna:</label>
      <input type="text" id="namaLengkap" name="namaLengkap" value="<?= $namaLengkap ?>">
      <br>
      <label for="alamat">Alamat:</label>
      <input type="text" id="alamatInput" name="alamat" value="<?= $alamat ?>">
      <br>
      <input type="submit" value="Simpan" onclick="updateProfile(event)">
    </form>
    <br>
    <input type="file" accept="image/*" onchange="previewImage(event)" id="image-upload">
    <label for="image-upload">Ganti Gambar</label>
  </div>
</div>

<script>
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var preview = document.getElementById('preview');
      preview.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }

  function updateProfile(event) {
    event.preventDefault(); // Mencegah pengiriman form secara default

    var namaLengkapInput = document.getElementById('namaLengkap');
    var namaPengguna = document.getElementById('namaPengguna');
    namaPengguna.textContent = namaLengkapInput.value;

    var alamatInput = document.getElementById('alamatInput');
    var alamat = document.getElementById('alamat');
    alamat.textContent = alamatInput.value;

    // Mengirim form secara asinkron menggunakan AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", event.target.form.action, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log("Profile data has been updated successfully!");
      } else {
        console.log("Failed to update profile data.");
      }
    };
    var formData = new FormData(event.target.form);
    xhr.send(new URLSearchParams(formData));
  }
</script>
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="https://kit.fontawesome.com/53b3156941.js" crossorigin="anonymous"></script>
</body>
</html>