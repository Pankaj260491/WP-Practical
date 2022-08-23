<?php

/** Change Login Logo **/
function my_login_logo() { 
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
  <style type="text/css">
    .login {background: #FFF;}
    #login h1 a, .login h1 a {
      background-image: url(<?php echo $image[0]; ?>) !important;
      margin: 0 auto;
      height: 83px;
      width: 195px;
      background-size: contain;
    }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/** Change login logo URL **/
function login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );