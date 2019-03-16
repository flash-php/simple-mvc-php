<p>Welcome, <?= $data['name']; ?></p>



<?php 

foreach($data['festivals'] as $festival){
  echo "<div class='festival'>";
  echo "<p>" . $festival['title'] . "</p>";
  echo "</div>";

  // print_r($festival);
} 

?>