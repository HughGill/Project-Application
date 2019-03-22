<?php include "templates/header.php";

	if(!isset($_SESSION["connected"]))
		header('Location: phone.php');
?>
		
<div class="modal-dialog modal-lg modal-dialog-centered"  id="container">	
		<div id="nav-container">
			<ul class="nav nav-tabs nav-justified" for="footer">
				<li>
					<a class="tablinks" href="contacts.php" style="color:black"><i class="fas fa-address-book"></i></a>			
				</li>
				<li>
					<a class="tablinks" href="log.php" style="color:black"><i class="fas fa-list-ul"></i></a>
				</li>
			</ul>
		</div>

		<div class="container" id="callScreen" name="callScreen">
			<form action="phone.php" method="post">
				<div class="container" id="call-screen">
					<div class="modal-dialog modal-lg modal-dialog-centered">
						<div class="display-number" id="display-number">
							<input class="textview" name="textview" id="textview">
						</div>
					</div>
				
					<div class="modal-dialog modal-lg modal-dialog-centered" id="table-of-digits">           
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