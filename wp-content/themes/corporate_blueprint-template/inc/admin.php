<?php
/**
 * User-friendly website settings in the WordPress dashboard.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Default values keep the current design intact before settings are saved.
 */
function mbscctv_get_homepage_defaults() {
    return array(
        'hero_eyebrow'              => '',
        'hero_title'                => 'Reimagine your online presence',
        'hero_highlight'            => '',
        'hero_description'          => 'Revive your online presence with a bold, modern design built to elevate your brand. Whether you are launching a startup, scaling your agency, or offering professional services, Inspiro gives you the perfect foundation to stand out.',
        'hero_primary_text'         => 'View Pricing',
        'hero_primary_url'          => '#pricing',
        'hero_secondary_text'       => 'Learn More',
        'hero_secondary_url'        => '#about',
        'hero_image_id'             => 0,
        'hero_default_image_url'    => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=900&q=85',
    );
}

/**
 * Return one homepage setting with its default value.
 */
function mbscctv_get_homepage_option( $key ) {
    $defaults = mbscctv_get_homepage_defaults();
    $options  = get_option( 'inspiro_homepage_options', array() );

    return isset( $options[ $key ] ) ? $options[ $key ] : ( $defaults[ $key ] ?? '' );
}

/**
 * Sanitize all homepage fields from one centralized schema.
 */
function mbscctv_sanitize_homepage_options( $input ) {
    $input = is_array( $input ) ? $input : array();

    return array(
        'hero_eyebrow'       => sanitize_text_field( $input['hero_eyebrow'] ?? '' ),
        'hero_title'         => sanitize_text_field( $input['hero_title'] ?? '' ),
        'hero_highlight'     => sanitize_text_field( $input['hero_highlight'] ?? '' ),
        'hero_description'   => sanitize_textarea_field( $input['hero_description'] ?? '' ),
        'hero_primary_text'  => sanitize_text_field( $input['hero_primary_text'] ?? '' ),
        'hero_primary_url'   => esc_url_raw( $input['hero_primary_url'] ?? '' ),
        'hero_secondary_text'=> sanitize_text_field( $input['hero_secondary_text'] ?? '' ),
        'hero_secondary_url' => esc_url_raw( $input['hero_secondary_url'] ?? '' ),
        'hero_image_id'      => absint( $input['hero_image_id'] ?? 0 ),
    );
}

function mbscctv_register_homepage_settings() {
    register_setting(
        'mbscctv_homepage_settings',
        'inspiro_homepage_options',
        array(
            'type'              => 'array',
            'sanitize_callback' => 'mbscctv_sanitize_homepage_options',
            'default'           => mbscctv_get_homepage_defaults(),
        )
    );
}
add_action( 'admin_init', 'mbscctv_register_homepage_settings' );

function mbscctv_register_website_menu() {
    add_menu_page(
        'Pengaturan Website',
        'Website',
        'manage_options',
        'mbscctv-website',
        'mbscctv_render_homepage_settings',
        'dashicons-admin-home',
        3
    );

    add_submenu_page(
        'mbscctv-website',
        'Homepage',
        'Homepage',
        'manage_options',
        'mbscctv-website',
        'mbscctv_render_homepage_settings'
    );
}
add_action( 'admin_menu', 'mbscctv_register_website_menu' );

/**
 * Load the media picker only on this theme's settings screens.
 */
function mbscctv_enqueue_admin_assets( $hook_suffix ) {
    if ( false === strpos( $hook_suffix, 'mbscctv-' ) ) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_style(
        'mbscctv-admin',
        get_template_directory_uri() . '/assets/css/admin.css',
        array(),
        MBSCCTV_VERSION
    );
    wp_enqueue_script(
        'mbscctv-admin',
        get_template_directory_uri() . '/assets/js/admin.js',
        array( 'jquery' ),
        MBSCCTV_VERSION,
        true
    );
}
add_action( 'admin_enqueue_scripts', 'mbscctv_enqueue_admin_assets' );

/**
 * Render a standard text field from the homepage options array.
 */
function mbscctv_homepage_text_field( $key, $label, $description = '' ) {
    $value = mbscctv_get_homepage_option( $key );
    ?>
    <div class="mbscctv-admin-field">
        <label for="mbscctv-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
        <input class="regular-text" id="mbscctv-<?php echo esc_attr( $key ); ?>" name="inspiro_homepage_options[<?php echo esc_attr( $key ); ?>]" type="text" value="<?php echo esc_attr( $value ); ?>">
        <?php if ( $description ) : ?>
            <p class="description"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>
    </div>
    <?php
}

function mbscctv_render_homepage_settings() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $image_id  = absint( mbscctv_get_homepage_option( 'hero_image_id' ) );
    $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : '';
    ?>
    <div class="wrap mbscctv-admin-wrap">
        <h1>Homepage</h1>
        <p class="mbscctv-admin-intro">Ubah isi halaman depan tanpa membuka kode atau editor halaman.</p>

        <?php settings_errors(); ?>
        <form action="options.php" method="post">
            <?php settings_fields( 'mbscctv_homepage_settings' ); ?>

            <section class="mbscctv-admin-panel">
                <div class="mbscctv-admin-panel-heading">
                    <h2>Hero</h2>
                    <p>Bagian utama yang pertama kali terlihat oleh pengunjung.</p>
                </div>
                <div class="mbscctv-admin-fields">
                    <?php mbscctv_homepage_text_field( 'hero_eyebrow', 'Label kecil' ); ?>
                    <?php mbscctv_homepage_text_field( 'hero_title', 'Judul utama' ); ?>
                    <?php mbscctv_homepage_text_field( 'hero_highlight', 'Teks berwarna' ); ?>

                    <div class="mbscctv-admin-field">
                        <label for="mbscctv-hero-description">Deskripsi</label>
                        <textarea class="large-text" id="mbscctv-hero-description" name="inspiro_homepage_options[hero_description]" rows="5"><?php echo esc_textarea( mbscctv_get_homepage_option( 'hero_description' ) ); ?></textarea>
                    </div>

                    <div class="mbscctv-admin-columns">
                        <div>
                            <?php mbscctv_homepage_text_field( 'hero_primary_text', 'Teks tombol utama' ); ?>
                            <?php mbscctv_homepage_text_field( 'hero_primary_url', 'URL tombol utama', 'Contoh: #contact atau https://example.com' ); ?>
                        </div>
                        <div>
                            <?php mbscctv_homepage_text_field( 'hero_secondary_text', 'Teks tombol kedua' ); ?>
                            <?php mbscctv_homepage_text_field( 'hero_secondary_url', 'URL tombol kedua', 'Contoh: #solutions atau /produk/' ); ?>
                        </div>
                    </div>

                    <div class="mbscctv-admin-field">
                        <label>Gambar Hero</label>
                        <div class="mbscctv-media-control">
                            <input class="mbscctv-media-id" name="inspiro_homepage_options[hero_image_id]" type="hidden" value="<?php echo esc_attr( $image_id ); ?>">
                            <div class="mbscctv-media-preview<?php echo $image_url ? '' : ' is-empty'; ?>">
                                <?php if ( $image_url ) : ?>
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="">
                                <?php else : ?>
                                    <span>Belum ada gambar yang dipilih</span>
                                <?php endif; ?>
                            </div>
                            <div class="mbscctv-media-actions">
                                <button class="button mbscctv-media-select" type="button">Pilih Gambar</button>
                                <button class="button-link-delete mbscctv-media-remove" type="button"<?php echo $image_url ? '' : ' hidden'; ?>>Hapus gambar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php submit_button( 'Simpan Perubahan' ); ?>
        </form>
    </div>
    <?php
}
