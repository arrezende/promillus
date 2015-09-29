<?php 

/****

All atributes
[row tag='div' class='lorem'] content [/row] = <div class="section lorem"> content </div>
[col tag='div' class='lorem2' n='6'] content [/col] = <div class="col-6 lorem"> content </div>
n = numero de colunas, maximo 12

Default values
[row] content [/row] = <div class="section"> content </div>
[col] content [/col] = <div class="col-12"> content </div>

Exemple
[row tag='section' class='box']
	[col class='item' n='6'] Content [/col]
	[col class='item' n='6'] Content [/col]
[/row]

Result
<section class="section box">
	<div class="col-6 item"> content </div>
	<div class="col-6 item"> content </div>
</section>

Exemple2
[row tag='section' class='box']
	[col class='item' n='6'] 
		[row_a tag='ul' class='inner-box'] 
			[col_a tag='li' class='item' n='6'] item1[/col_a]
			[col_a tag='li' class='item' n='2'] item2[/col_a]
			[col_a tag='li' class='item' n='2'] item3[/col_a]
			[col_a tag='li' class='item' n='2'] item4[/col_a]
		[/row_a]
	[/col]
	[col class='item' n='6'] Content [/col]
[/row]

Result
<section class="section box">
	<div class="col-6 item">
		<ul class="section inner-box">
			<li class="col-6 item"> item1</li>
			<li class="col-2 item"> item2</li>
			<li class="col-2 item"> item3</li>
			<li class="col-2 item"> item4</li>
		</ul>
	</div>
	<div class="col-6 item"> content </div>
</section>
*****/

// linha
function row( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'tag' => 'div',
			'class' => '',
		), $atts )
	);

	return '<'. $tag .' class="section '. $class .'">'. do_shortcode( $content )  .'</'. $tag .'>';
}
add_shortcode( 'row', 'row' );

// linha2
function row_a( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'tag' => 'div',
			'class' => '',
		), $atts )
	);

	return '<'. $tag .' class="section '. $class .'">'. do_shortcode( $content )  .'</'. $tag .'>';
}
add_shortcode( 'row_a', 'row_a' );

// Coluna
function col( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'tag' => 'div',
			'class' => '',
			'n' => '12',
		), $atts )
	);

	return '<'. $tag .' class="col-'. $n .' '. $class .'">'. do_shortcode( $content )  .'</'. $tag .'>';
}
add_shortcode( 'col', 'col' );

// Coluna2
function col_a( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'tag' => 'div',
			'class' => '',
			'n' => '12',
		), $atts )
	);

	return '<'. $tag .' class="col-'. $n .' '. $class .'">'. do_shortcode( $content )  .'</'. $tag .'>';
}
add_shortcode( 'col_a', 'col_a' );

?>