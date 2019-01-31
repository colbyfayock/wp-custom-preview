<?

class WpCustomPreviewLink {

  private $options;

  public function __construct() {
    add_filter( 'preview_post_link', array( $this, 'configurePreviewLink' ) );
  }

  /**
   * Customize the preview button in the WordPress admin to point to the headless client.
   * via https://medium.com/kata-engineering/headless-wordpress-next-js-what-we-learned-c10abdf80f6a#3350
   */

  public function configurePreviewLink( $link ) {

    // THIS DOESNT WORK ON LATEST

    return 'https://test.com/asdf';

    $this->options = get_option( 'wp_custom_preview_settings' );

    if ( is_empty($this->options['preview_link_base']) ) {
      return $link;
    }

    return $this->options['preview_link_base'] . '?id=' . get_the_ID();
      // . '_preview/'
      // . get_the_ID() . '/'
      // . wp_create_nonce( 'wp_rest' );

  }


}