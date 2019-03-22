</main>

<footer class="footer" id="footer" name="footer">
		<div class="container mt-3">
			<ul class="nav nav-tabs nav-justified">
				<?php if(isset($_SESSION['connected']) && $_SESSION['connected']) {  ?>
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "phone.php"){echo "active";}?>">
					<a class="nav-link active" href="#">
						<i class="fas fa-phone"></i>
					</a>
				</li>
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "message.php"){echo "active";}?>">
					<a class="nav-link" href="#">
						<i class="fas fa-envelope"></i>
					</a>
				</li>
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "blocked.php"){echo "active";}?>">
					<a class="nav-link" href="#">
						<i class="fas fa-ban"></i>
					</a>
				</li>
				<li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "settings.php"){echo "active";}?>">
					<a class="nav-link" href="#">
						<i class="fas fa-cog"></i>
					</a>
				</li>
				<?php } ?>
			</ul>				
		</div> 
</footer>
</body>
</html>