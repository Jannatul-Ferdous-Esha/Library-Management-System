<?php
session_start();
include "db_connection.php";

$selectquery = "SELECT * FROM book";
$conn = OpenCon();
$runquery =$conn->query($selectquery);

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Table Page</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				echo "The number of rows are: ".$runquery -> num_rows."<br>"; 
				?>
				<div>
					<table border="1" cellpadding="15">
						<tr>
							<th>Name</th>
							<th>Author Name</th>
							<th>Category</th>
							<th>Total No Of Books</th>
							<th>Available No Of Book</th>
						</tr>
						<?php 
						if(($runquery -> num_rows)>0){ ?>
							<?php
							while($resshow = $runquery -> fetch_assoc()){  ?>	
								<tr>
									<td><?php echo $resshow['book_name'];?></td>
									<td><?php echo $resshow['author_name'];?></td>
									<td><?php echo $resshow['category'];?></td>
									<td><?php echo $resshow['total_no_of_book'];?></td>
                                    <td><?php echo $resshow['available_no_of_book'];?></td>
									<td>
										<button type="button" class="btn btn-warning"><a href="edit.php?book_id=<?php echo $resshow['book_id'] ?>">Edit</a></button>
										<button type="button" class="btn btn-danger"><a  href="delete.php?book_id=<?php echo $resshow['book_id'] ?>">Delete</a></button>
									</td>
								</tr>
							<?php } ?>	
						<?php }else{ ?>
							<tr>
								<td colspan="5" style="text-align: center;"><h4>There is no data in the database!</h4></td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<br>
				<button type="button" class="btn btn-outline-secondary"><a href="admin.php">Go Back</a></button>
			</div>
		</div>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
