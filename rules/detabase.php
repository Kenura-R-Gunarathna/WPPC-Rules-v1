<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect( 'localhost', 'root', '', 'WPPC_Rules');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"WPPC_Rules");
$sql="SELECT RULE_ID, TEXT_CONTENT_DOCUMENT FROM WPPC_Rules";
$result = mysqli_query($con,$sql);

echo '<table class="table table-hover table-striped">
        <thead>
            <th>Rule Id</th>
            <th>View</th>
		    <th>Language</th>
            <th>Language</th>
		    <th>Language</th>
        </thead>';
while($row = mysqli_fetch_array($result)) {
echo "<tbody>";
echo "<tr>";
echo "<td>" . $row['RULE_ID'] . "</td>";
echo "<td>" . $row['TEXT_CONTENT_DOCUMENT'] . "</td>";
echo "<td><a>Sinhala</a></td>";
echo "<td><a>Tamil</a></td>";
echo "<td><a>English</a></td>";
echo "</tr>";

echo '  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rule&nbsp ' . $row['RULE_ID'] . '</h4>
        </div>
        <div class="modal-body">
          <p><iframe width="100%"height="50%"border="0px"src=""></iframe></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>';


}
echo "</tbody>";
echo "</table>";
mysqli_close($con);
?>
</body>
</html>