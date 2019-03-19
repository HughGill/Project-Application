<?php include "templates/header.php";
	
	if(!isset($_SESSION["connected"]))
	header('Location: blocked.php');
?>
<div>
    <div id="container" class="container">
        <form method="Get" action="blocked.php">
            <div id="container">
                <div>
                    <label>Number:/t</label>
                </div>
            </div>
        </form>
        <div id="nav-container">
			<ul class="nav nav-tabs nav-justified">
				<li>
					<a href="phone.php" style="color:black">
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
				<li class="active">
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


<?php include "templates/footer.php"
?>