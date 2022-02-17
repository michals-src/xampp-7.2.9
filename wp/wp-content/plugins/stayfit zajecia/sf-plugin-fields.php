<?php


function sf_meta_box()
{

    add_meta_box(
      "sf-exercise-meta_box",
      "Informacja",
      "sf_meta_box_return",
      "exercise",
      'normal',
      'core'
    );

}
add_action( "add_meta_boxes", "sf_meta_box" );

function sf_meta_box_return( $post )
{

  wp_nonce_field( basename(__FILE__), "sf-exercise-nonce" );

  echo "<pre>" . print_r($post, true) . "</pre>";
  echo "Hello World !";

  $settings = array(
    'textarea_rows' => 15,
    'media_buttons' => false,
    'wpautop' => false
  );

  wp_editor( $post->post_content, "sf-exercise-description", $settings );

}

function sf_meta_box_save( $post_ID ){

  $is_autosave = wp_is_post_autosave( $post_ID );
  $is_revision = wp_is_post_revision( $post_ID );
  $valid_nonce = ( isset( $_POST[ "sf-exercise-nonce" ] ) && wp_verify_nonce( $_POST[ "sf-exercise-nonce" ], basename(__FILE__) ) ) ? true : false;

  if( $is_autosave || $is_revision || !$valid_nonce ) return;
  remove_action('save_post', 'sf_meta_box_save');
  wp_update_post( array(
    "post_content"  => $_POST['sf-exercise-description']
  ) );
  add_action( "save_post", "sf_meta_box_save" );

}

add_action( "save_post", "sf_meta_box_save" );


?>
