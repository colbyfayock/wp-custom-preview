<?

class WpCustomPreviewSettings {

  private $options;

  public function __construct() {
    add_action( 'admin_menu', array( $this, 'addPluginPage' ) );
    add_action( 'admin_init', array( $this, 'pageInit' ) );
  }

  /**
   * Add options page
   */

  public function addPluginPage() {

    add_options_page(
      'WP Custom Preview Settings Page',
      'WP Custom Preview',
      'manage_options',
      'wp-custom-preview',
      array( $this, 'createAdminPage' )
    );

  }

  /**
   * Options page callback
   */

  public function createAdminPage() {

    // Set class property

    $this->options = get_option( 'wp_custom_preview_settings' );

    ?>
    <div class="wrap">

      <h2>WP Custom Preview</h2>

      <form method="post" action="options.php">

        <? settings_fields( 'wp_custom_preview' ) ?>

        <? do_settings_sections( 'wp-custom-preview-settings' ) ?>

        <? submit_button() ?>

      </form>

    </div>
    <?
  }

  /**
   * Register and add settings
   */

  public function pageInit() {

    register_setting(
      'wp_custom_preview', // Option group
      'wp_custom_preview_settings', // Option name
      array( $this, 'sanitize' ) // Sanitize
    );

    add_settings_section(
      'setting_section_id', // Section ID
      'Settings', // Title of section
      null,
      'wp-custom-preview-settings' // Page
    );

    add_settings_field(
      'preview_link_base',
      'Preview Base',
      array( $this, 'getPreviewBaseInput' ),
      'wp-custom-preview-settings', // Page
      'setting_section_id' // Section
    );
  }


  /**
   * Sanitize each setting field as needed
   *
   * @param array $input Contains all settings fields as array keys
   */

  public function sanitize( $input )  {

    $new_input = array();

    $new_input['preview_link_base'] = filter_var($input['preview_link_base'], FILTER_SANITIZE_URL);

    return $new_input;

  }

  public function getPreviewBaseInput() {
    printf(
      '<input type="text" id="preview_link_base" name="wp_custom_preview_settings[preview_link_base]" value="%s" placeholder="/test" />',
      isset( $this->options['preview_link_base'] ) ? esc_attr( $this->options['preview_link_base']) : ''
    );
  }

}