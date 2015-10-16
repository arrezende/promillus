	<?php global $data;?>   
    <footer class="bg blue" id="footer">	
		<div class="copy section container">
			<div class='col-10'>
				<?php if($data['footer_text'] != ''){ echo $data['footer_text']; } else { echo '© Copyright 2015. Promillus'; } ?>
			</div>
			<div class='col-2 redes'>
				<?php if($data['facebook'] != ''){ echo "<a  href=".$data['facebook']."><i class='fa fa-facebook-f'></i></a>"; }; ?>
				<?php if($data['twitter'] != ''){ echo "<a  href=".$data['twitter']."><i class='fa fa-youtube-play'></i></a>"; }; ?>
				<?php if($data['nstagram'] != ''){ echo "<a  href=".$data['nstagram']."><i class='fa fa-instagram'></i></a>"; }; ?>
				
			</div>
		</div>
		
	</footer>
    
<?php wp_footer(); ?>
<!--a href="#" class="voltarTopo" onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);"><i class="fa fa-arrow-up"></i></a-->
</body>
</html>