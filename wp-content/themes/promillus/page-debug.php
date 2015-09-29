<?php
/*
Template Name: Debug
*/
get_header();

global $data;
echo '<img src="'.$data['media_logo'].'" />';
echo $data['title_destaque'];
echo $data['text_destaque'];
?>
		<pre>
		<?php 
		$smof_data_r = print_r($smof_data, true); 
		$smof_data_r_sans = htmlspecialchars($smof_data_r, ENT_QUOTES); 
		echo $smof_data_r_sans; ?>
		</pre>
	
<?php get_footer(); ?>
