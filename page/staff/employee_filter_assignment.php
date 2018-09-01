<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['employee_id'])){
header("location: ../../index.html");
}
?>

<?php
if(isset($_POST["from_date"], $_POST["to_date"]))
 {
      include "database.php";
      $output = '';
	  
$output .= '
<div class = "table-responsive">
<table class="table table-bordered table-striped table-hover dataTable js-exportable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Title</th>
			<th>Description</th>
			<th>Start Date</th>
			<th>Due Date</th>
			<th>Status</th>
        </tr>
    </thead>
';
$abc=$_SESSION['employee_id'];
	$sql = "SELECT *
			FROM project
			WHERE project_date_created BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'
			";
	$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0)
    {
	$x=1;
        while($row = mysqli_fetch_array($result))
        {
			$project_status = $row["project_status"];

				if($project_status == 'Delayed'){
					$alert = "<div class='badge bg-red'>
					<strong>$project_status</strong>
					</div>";

				}else if($project_status == 'In Progress'){
					$alert = "<div class='badge bg-blue'>
					<strong>$project_status</strong>
					</div>";

				}else {
					$alert = "<div class='badge bg-green'>
					<strong>$project_status</strong>
					</div>";
					}
            $output .= '
				<tbody>
					<tr>
						<td>'.$x.'</td>
						<td>'. $row["project_name"] .'</td>
						<td>'. nl2br($row["project_description"]) .'</td>
						<td>'. $row["project_date_created"] .'</td>
						<td>'. $row["project_due_date"] .'</td>
						<td>'. $alert .'</td>

						</tr>
				</tbody>
			';
		$x++;  }
	}
	else
	{
			$output .= '
			 <tr>
                     <td colspan="6">No Assignment Found</td>
                </tr>
           ';

	}
			$output .= '</table>';
			'</div>';
			echo $output;
}

           //#END# Exportable Table -->
 ?>
