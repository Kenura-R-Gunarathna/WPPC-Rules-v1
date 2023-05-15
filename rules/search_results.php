
<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','WPPC_Rules');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"wppc_Rules");
$sql="SELECT * FROM wppc_Rules WHERE RULE_ID = '".$q."' OR RULE_ID REGEXP '".$q."'";
$result = mysqli_query($con,$sql);
echo '						<div class="col-md-12"id="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                 <table border="0px" width="100%"> <tr>  <td><h4 class="card-title"id="card-title">Voice Search</td> <td rowspan="2"><img align="right"src="../assets/img/voice.gif"height="90px"width="120px"></h4>
</td>                                </div></tr>
                                <tr><td><div class="card-body">
<p align="left"id="search_text"> For '.$q.'</p>
                                </div></td></tr></table>
                            </div>
                        </div>';
while($row = mysqli_fetch_array($result)) {

echo '							<div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"id="card-title">Rule &nbsp' . $row['RULE_ID'] . '</h4>
                                </div>
                                <div class="card-body">
<p align="left"id="search_text">' . $row['TEXT_CONTENT_DOCUMENT'] . '<br><br>';echo"<a style='color:#0066cc'  onclick='openWin1()'>Sinhala</a><br><a style='color:#0066cc'  onclick='openWin2()'>Tamil</a><br><a style='color:#0066cc'  onclick='openWin3()'>English</a></p>
                                </div>
                            </div>
                        </div>";
echo'<script>
var myWindow1;
function openWin1() {
  myWindow1 = window.open("./pdf/rules/'.$row['RULE_ID'].'sin.pdf", "", "width=800, height=600");
  myWindow1.focus();
}
var myWindow2;
function openWin2() {
  myWindow2 = window.open("./pdf/rules/'.$row['RULE_ID'].'ta.pdf", "", "width=800, height=600");
  myWindow2.focus();
}
var myWindow3;
function openWin3() {
  myWindow3 = window.open("./pdf/rules/'.$row['RULE_ID'].'en.pdf", "", "width=800, height=600");
  myWindow3.focus();
}
</script>
';	
	}
mysqli_close($con);
?>
 