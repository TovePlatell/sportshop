<?php

/*
 Plugin name: qtyplugin
 
*/  ?>


<?php
add_action( 'woocommerce_after_quantity_input_field', 'tove_display_quantity_plus' );

function tove_display_quantity_plus() {
echo '<button type="button" class="plus" >+</button>';
}
add_action( 'woocommerce_before_quantity_input_field', 'tove_display_quantity_minus' );

function tove_display_quantity_minus() {
echo '<button type="button" class="minus" >-</button>';
}
// -------------
// 2. Trigger update quantity script
add_action( 'wp_footer', 'tove_add_cart_quantity_plus_minus' );
function tove_add_cart_quantity_plus_minus() {
if ( ! is_product() && ! is_cart() ) return;
wc_enqueue_js( "
$('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
var qty = $( this ).parent( '.quantity' ).find( '.qty' );
var val = parseFloat(qty.val());
var max = parseFloat(qty.attr( 'max' ));
var min = parseFloat(qty.attr( 'min' ));
var step = parseFloat(qty.attr( 'step' ));
if ( $( this ).is( '.plus' ) ) {
if ( max && ( max <= val ) ) {
qty.val( max );
} else {
qty.val( val + step );
}
} else {
if ( min && ( min >= val ) ) {
qty.val( min );
} else if ( val > 1 ) {
qty.val( val - step );
}
}
});
" );
}
?>