<?php include "templates/header.php";

	if(!isset($_SESSION["connected"]))
		header('Location: index.php');
?>

<title>Call Screen</title>
<h1 class="col-sm-6 offset-sm-3 text-center py-4">Call</h1>	
<div class="modal-dialog modal-lg modal-dialog-centered"  id="container">	
		<div class="container" id="callScreen" name="callScreen">
			<form action="phone.php" method="post">
				<div class="container" id="call-screen" style="width: 100%">
					<div id="display">
						<div class="display-number" id="display-number">
							<input class="form-control" name="textview" id="textview" value="textview">
						</div>
					</div>
				
					<div id="table-of-digits">           
						<table class="table">
							<tbody>
								<tr>
									<td><button type="button" class="btn btn-light" value="1" id="1" name="1" onclick="insert(1)">1</button></td>
									<td><button type="button" class="btn btn-light" value="2" id="2" name="2" onclick="insert(2)">2</button></td>
									<td><button type="button" class="btn btn-light" value="3" id="3" name="3" onclick="insert(3)">3</button></td>
								</tr>
								<tr>
									<td><button type="button" class="btn btn-light" value="4" id="4" name="4" onclick="insert(4)">4</button></td>
									<td><button type="button" class="btn btn-light" value="5" id="5" name="5" onclick="insert(5)">5</button></td>
									<td><button type="button" class="btn btn-light" value="6" id="6" name="6" onclick="insert(6)">6</button></td>
								</tr>
								<tr>
									<td><button type="button" class="btn btn-light" value="7" id="7" name="7" onclick="insert(7)">7</button></td>
									<td><button type="button" class="btn btn-light" value="8" id="8" name="8" onclick="insert(8)">8</button></td>
									<td><button type="button" class="btn btn-light" value="9" id="9" name="9" onclick="insert(9)">9</button></td>
									
								</tr>
								<tr>
									<td><button type="button" class="btn btn-light" value="*" id="*" name="*" onclick="insert(*)">*</button></td>
									<td><button type="button" class="btn btn-light" value="0" id="0" name="0" onclick="insert(0)">0</button></td>
									<td><button type="button" class="btn btn-light" value="#" id="#" name="#" onclick="insert(#)">#</button></td>
								</tr>
								<tr>
									<td></td>
									<td><button type="button" class="btn btn-success" id="call" name="call"><i class="fas fa-phone"></i></button></td>
									<td><button type="button" class="btn btn-light" id="delete" name="delete" onclick=back() style="color:black"><i class="fas fa-backspace"></i></button></td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>
<!-- Scripts for the screen input -->
<script>
	function insert(num) {
    document.form.textview.value += num;
}

	function back() {
    var exp = document.form.textview.value;
    document.form.textview.value = exp.substring(0, exp.length - 1);
}
</script>


<!-- nexmo connection -->

<?php include "templates/footer.php"
?>