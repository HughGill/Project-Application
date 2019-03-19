<?php include "templates/header.php";

	if(!isset($_SESSION["connected"]))
		header('Location: phone.php');
?>
		
<div class="modal-dialog modal-lg modal-dialog-centered"  id="container">	
	<div>
	<div id="nav-container">
			<ul class="nav nav-tabs nav-justified" for="footer">
				<li>
					<a class="tablinks" href="contacts.php" style="color:black"><button class="tablinks" id="contacts"><i class="fas fa-address-book"></i></button></a>			
				</li>
				<li>
					<a class="tablinks" href="log.php" style="color:black"><button class="tablinks" id="log"><i class="fas fa-list-ul"></i></button></a>
				</li>
			</ul>
		</div>

		<div class="container" id="callScreen" name="callScreen">
			<form action="/make_call.php" method="post">
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
										<td><button type="button" class="btn btn-light" value="1" id="1" name="1" onchange="insert(1)">1</button></td>
										<td><button type="button" class="btn btn-light" value="2" id="2" name="2" onchange="insert(2)">2</button></td>
										<td><button type="button" class="btn btn-light" value="3" id="3" name="3" onchange="insert(3)">3</button></td>
									</tr>
									<tr>
										<td><button type="button" class="btn btn-light" value="4" id="4" name="4" onchange="insert(4)">4</button></td>
										<td><button type="button" class="btn btn-light" value="5" id="5" name="5" onchange="insert(5)">5</button></td>
										<td><button type="button" class="btn btn-light" value="6" id="6" name="6" onchange="insert(6)">6</button></td>
									</tr>
									<tr>
										<td><button type="button" class="btn btn-light" value="7" id="7" name="7" onchange="insert(7)">7</button></td>
										<td><button type="button" class="btn btn-light" value="8" id="8" name="8" onchange="insert(8)">8</button></td>
										<td><button type="button" class="btn btn-light" value="9" id="9" name="9" onchange="insert(9)">9</button></td>
										
									</tr>
									<tr>
										<td><button type="button" class="btn btn-light" value="*" id="*" name="*" onchange="insert(*)">*</button></td>
										<td><button type="button" class="btn btn-light" value="0" id="0" name="0" onchange="insert(0)">0</button></td>
										<td><button type="button" class="btn btn-light" value="#" id="#" name="#" onchange="insert(#)">#</button></td>
									</tr>
									<tr>
										<td></td>
										<td><button type="button" class="btn btn-success" id="call" name="call"><i class="fas fa-phone"></i></button></td>
										<td><button type="button" class="btn btn-light" id="delete" name="delete" onchange="back()" style="color:black"><i class="fas fa-backspace"></i></button></td>
									</tr>
								</tbody>
							</table>
						</div>

					</div>
				</form>
		<div id="nav-container">
			<ul class="nav nav-tabs nav-justified">
				<li class="active">
					<a href="#" style="color:black">
						<button class="tablinks">
							<i class="fas fa-phone"></i>
						</button>
					</a>
				</li>
				<li>
					<a href="message.php" style="color:black">
						<button class="tablinks">
							<i class="fas fa-envelope"></i>
						</button>
					</a>
				</li>
				<li>
					<a href="blocked.php" style="color:black">
						<button>
							<i class="fas fa-ban"></i>
						</button>
					</a>
				</li>
				<li>
					<a href="settings.php" style="color:black">
						<button class="tablinks">
							<i class="fas fa-cog"></i>
						</button>
					</a>
				</li>
			</ul>
		</div>		
	
	</div>
</div>



<?php include "templates/footer.php"
?>