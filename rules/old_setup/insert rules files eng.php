<?php
ini_set('upload_max_filesize', '1000M');
ini_set('post_max_size', '1000M');
ini_set('max_input_time', 6000);
ini_set('max_execution_time', 6000);
if ( isset($_FILES['file']) ) {
    $tmp_name = $_FILES['file']['tmp_name'];
    // Set a unique name to prevent replacing of file
    $new_name = uniqid().$_FILES['file']['name'];
    // move the file to a directory
    move_uploaded_file( $tmp_name, 'eng/'.$new_name );

    echo '<img src=" eng/'.$new_name.' width="300px">';
  }
   else {
   // Show the message if no file has been chosen
   echo "<h3>No file has been chosen</h3>";
 }
 ?>