<?php include "templates/header.php";

	if(!isset($_SESSION["connected"]))
		header('Location: index.php');
?>
	
<div class="modal-dialog modal-lg modal-dialog-centered"  id="container">	
		<div class="container" id="callScreen" name="callScreen">
			<form action="phone.php" method="post">
				<div class="container" id="call-screen" style="width: 100%">				
					<div id="table-of-digits">           
						<table class="table">
							<thead>
								<tr>
									</td><input class="form-control" name="display" id="display"></td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="1" id="phoneNoValue" name="1" data-number="1">1</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="2" id="phoneNoValue" name="2" data-number="2">2</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="3" id="phoneNoValue" name="3" data-number="3">3</button></td>
								</tr>
								<tr>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="4" id="phoneNoValue" name="4" data-number="4">4</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="5" id="phoneNoValue" name="5" data-number="5">5</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="6" id="phoneNoValue" name="6" data-number="6">6</button></td>
								</tr>
								<tr>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="7" id="phoneNoValue" name="7" data-number="7">7</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="8" id="phoneNoValue" name="8" data-number="8">8</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="9" id="phoneNoValue" name="9" data-number="9">9</button></td>
									
								</tr>
								<tr>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="*" id="phoneNoValue" name="*" data-number="*">*</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="0" id="phoneNoValue" name="0" data-number="0">0</button></td>
									<td><button type="button" class="btn btn-light btn-xs1 dial" value="#" id="phoneNoValue" name="#" data-number="#">#</button></td>
								</tr>
								<tr>
									<td><button type="button" class="btn btn-lg btn-light" id="clear" name="clear" value="C">C</button></td>
									<td><button type="submit" class="btn btn-lg btn-success" id="call" name="call" style="border-radius: 50%"><i class="fas fa-phone"></i></button></td>
									<td><button type="button" class="btn btn-primary dropdown-toggle" id="option" name="option" data-toggle="dropdown">
										<i class="fas fa-plus"></i>
											<span class="caret"></span></button>
												<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
													<li role="presentation"><a role="menuitem" href="block.php">Block</a></li>
													<li role="presentation"><a role="menuitem" href="createContact.php">Add to Contacts</a></li>
												</ul>
									</td>
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
<script type="text/javascript">
$(".dial").click(function () {
    var number = $(this).data('number');
    $("#display").val(function() {
        return this.value + number;
    });
});

$("#clear").click(function (){
	$("#display").val(function(){
		return this.value = '';
	})
});
</script>


<!-- nexmo connection -->
<?php 
	if (! empty( $_POST ) ) {

		$Number = $_POST['display'];

		require_once __DIR__ . './vendor/autoload.php';
		// Building Blocks
		// 1. Make a Phone Call
		// 2. Play Text-to-Speech
		$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), 'b8846262-5efa-49e4-ac83-0252a7b44bfb');
		$client = new \Nexmo\Client($keypair);
		try{
			$call = $client->calls()->create([
				'to' => [[
					'type' => 'phone',
					'number' => $Number
				]],
				'from' => [
					'type' => 'phone',
					'number' => '12046743488'
				],
				'answer_url' => ['https://developer.nexmo.com/ncco/tts.json'],
			]);
		}
		catch (Exception $e){
		echo "The call couldn't be made. Error: " . $e->getMessage() . "\n";    
		}
	}

include "templates/footer.php"
?>