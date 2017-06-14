<form method="POST" action="">
  <p>URL Photo</p>
  <input type="text" name="urlPhoto";><br>
  <small>ex : https://www.instagram.com/p/BVR0FNHjkUp</small>
  <p>level(1-10)</p>
  <input type="text" name="like">
  <input type="submit">
</form>

<?php
if (isset($_POST['urlPhoto']) and isset($_POST['like'])) {
  if ($_POST['urlPhoto'] != "" and $_POST['like'] != "" ) {
    if ($_POST['like'] <= 10) {
      $url='http://api.instagram.com/oembed/?url='.$_POST['urlPhoto'];
      $json = file_get_contents($url);
      $ig = json_decode($json,true);
      // var_dump($contacts);
      function webLike($media_id)
      {
        $proses = file_get_contents("http://194.58.115.48/add?id=".$media_id);
        return $proses;
      }
      for ($i=0; $i < $_POST['like'] ; $i++) {
        webLike($ig['media_id']);
      }
      echo "<h2>Cek bang!</h2>";
      echo "<p>Nama : ".$ig['author_name']."</p>";
      echo "<p>Media ID: ".$ig['media_id']."</p>";
      echo "<p>Gambarnya</p>";
      echo "<img width='20%'src=".$ig['thumbnail_url'].">";
    }
    else {
      echo "1-10 bang :3";
    }
  }
  else {
    echo "Di lengkapi dul :3";
  }
}

else {
  echo "Ganteng";
}
?>
<center><h2><a href="http://fb.com/fighter.cyber1">By Jondes</a></h2></center>
