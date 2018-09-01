<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['manager_id'])){
header("location: ../../index.html");
}
?>

<?php
if(isset($_POST["from_date"], $_POST["to_date"]))
 {
      include "database.php";
      $output = '';
	 /* $abc=$_SESSION['employee_id'];
                    $query = "SELECT task.task_id,task.task_title, task.task_status, task.task_due_date, task.task_description, project.project_id, project.project_name, employee.employee_id
							FROM task,project, employee
							WHERE task_created BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'

							";
$result = mysqli_query($connect, $query);   */
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
$abc=$_SESSION['manager_id'];
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
			/*$task_id = $row['task_id'];
            $task_title = $row['task_title'];
            $project_name = $row['project_name'];
			$task_status = $row['task_status'];
            $task_due_date = $row['task_due_date'];
			$task_description = $row['task_description'];*/
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
