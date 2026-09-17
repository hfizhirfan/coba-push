<?php
/**
 * WooCommerce integrations.
 *
 * @package MBSCCTV
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * WooCommerce Support
 */
function mbscctv_woocommerce_setup() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 600,
        'single_image_width'    => 800,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 1,
            'default_columns' => 3,
            'min_columns'     => 1,
            'max_columns'     => 4,
        ),
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mbscctv_woocommerce_setup' );

/**
 * Remove default WooCommerce wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function mbscctv_wc_wrapper_before() {
    echo '<main class="py-12 lg:py-20 bg-background-light dark:bg-background-dark">';
    echo '<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">';
}
add_action( 'woocommerce_before_main_content', 'mbscctv_wc_wrapper_before' );

function mbscctv_wc_wrapper_after() {
    echo '</div>';
    echo '</main>';
}
add_action( 'woocommerce_after_main_content', 'mbscctv_wc_wrapper_after' );

/**
 * Remove default WooCommerce sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Product category icon mapping
 */
function mbscctv_get_category_icon( $slug ) {
    $icons = array(
        'cctv'             => 'videocam',
        'access-control'   => 'fingerprint',
        'intrusion-alarm'  => 'emergency_home',
        'fire-alarm'       => 'local_fire_department',
        'public-address'   => 'campaign',
        'voice-alarm'      => 'campaign',
        'video-door-phone' => 'doorbell',
    );
    return isset( $icons[ $slug ] ) ? $icons[ $slug ] : 'security';
}

/**
 * Custom number of products per page
 */
function mbscctv_products_per_page( $cols ) {
    return 12;
}
add_filter( 'loop_shop_per_page', 'mbscctv_products_per_page' );

/**
 * WooCommerce breadcrumb defaults
 */
function mbscctv_wc_breadcrumb_defaults( $defaults ) {
    $defaults['delimiter']   = ' <span class="material-symbols-outlined text-xs align-middle text-slate-400 mx-1">chevron_right</span> ';
    $defaults['wrap_before'] = '<nav class="mb-8 text-sm text-slate-500">';
    $defaults['wrap_after']  = '</nav>';
    $defaults['before']      = '<span>';
    $defaults['after']       = '</span>';
    return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'mbscctv_wc_breadcrumb_defaults' );
/**
 * ============================================================
 * Native FAQ System for Product Categories (No ACF Required)
 *
 * Stores FAQ data as serialized array in term_meta.
 * Provides admin UI with WYSIWYG editor on product_cat screen.
 * ============================================================
 */

/**
 * Get FAQ items for a term (helper)
 *
 * @param  int|WP_Term $term Term ID or object.
 * @return array Array of [ 'question' => '', 'answer' => '' ]
 */
function mbscctv_get_faq_items( $term ) {
    $term_id = is_object( $term ) ? $term->term_id : (int) $term;
    $faq     = get_term_meta( $term_id, '_mbscctv_faq', true );
    return is_array( $faq ) ? $faq : array();
}

/**
 * Enqueue WP Editor assets on product_cat & product_brand taxonomy screens
 */
function mbscctv_enqueue_admin_editor( $hook ) {
    if ( 'term.php' === $hook || 'edit-tags.php' === $hook ) {
        $screen = get_current_screen();
        if ( $screen && in_array( $screen->taxonomy, array( 'product_cat', 'product_brand' ), true ) ) {
            wp_enqueue_editor();
        }
    }
}
add_action( 'admin_enqueue_scripts', 'mbscctv_enqueue_admin_editor' );

/**
 * Add FAQ fields to product_cat "Edit" screen (with WYSIWYG)
 */
function mbscctv_product_cat_faq_fields( $term ) {
    $faq_items = mbscctv_get_faq_items( $term );
    wp_nonce_field( 'mbscctv_save_faq', 'mbscctv_faq_nonce' );
    ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label>FAQ (Pertanyaan Umum)</label>
        </th>
        <td>
            <div id="mbscctv-faq-wrapper">
                <?php if ( ! empty( $faq_items ) ) : ?>
                    <?php foreach ( $faq_items as $i => $item ) : ?>
                        <div class="mbscctv-faq-row" style="background:#f9f9f9;border:1px solid #ddd;padding:15px;margin-bottom:12px;border-radius:4px;">
                            <div style="margin-bottom:10px;">
                                <label style="font-weight:600;display:block;margin-bottom:4px;">Pertanyaan</label>
                                <input type="text" name="mbscctv_faq[<?php echo $i; ?>][question]" value="<?php echo esc_attr( $item['question'] ); ?>" class="widefat" />
                            </div>
                            <div style="margin-bottom:10px;">
                                <label style="font-weight:600;display:block;margin-bottom:4px;">Jawaban</label>
                                <textarea id="mbscctv_faq_answer_<?php echo $i; ?>" name="mbscctv_faq[<?php echo $i; ?>][answer]" rows="8" class="widefat mbscctv-faq-answer"><?php echo esc_textarea( $item['answer'] ); ?></textarea>
                            </div>
                            <button type="button" class="button mbscctv-faq-remove" style="color:#a00;">Hapus FAQ ini</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <p>
                <button type="button" class="button button-primary" id="mbscctv-faq-add">+ Tambah FAQ</button>
            </p>
            <p class="description">Tambahkan pertanyaan yang sering diajukan untuk kategori/brand ini. Maksimal 20 item. Jawaban mendukung HTML (bold, italic, list, link).</p>

            <script>
            jQuery(document).ready(function($) {
                var wrapper = document.getElementById('mbscctv-faq-wrapper');
                var maxFaq  = 20;

                // WYSIWYG editor settings
                var editorSettings = {
                    tinymce: {
                        toolbar1: 'bold,italic,underline,strikethrough,|,bullist,numlist,|,link,unlink,|,undo,redo',
                        toolbar2: '',
                        plugins: 'lists,link,paste',
                        paste_as_text: true
                    },
                    quicktags: true,
                    mediaButtons: false
                };

                // Initialize WYSIWYG for existing textareas
                if (typeof wp !== 'undefined' && wp.editor) {
                    $('.mbscctv-faq-answer').each(function() {
                        wp.editor.initialize(this.id, editorSettings);
                    });
                }

                function getNextIndex() {
                    var rows = wrapper.querySelectorAll('.mbscctv-faq-row');
                    var max = -1;
                    rows.forEach(function(row) {
                        var input = row.querySelector('input[type="text"]');
                        if (input) {
                            var match = input.name.match(/mbscctv_faq\[(\d+)\]/);
                            if (match) max = Math.max(max, parseInt(match[1]));
                        }
                    });
                    return max + 1;
                }

                // Add new FAQ row
                $('#mbscctv-faq-add').on('click', function() {
                    if (wrapper.querySelectorAll('.mbscctv-faq-row').length >= maxFaq) {
                        alert('Maksimal ' + maxFaq + ' FAQ.');
                        return;
                    }
                    var idx = getNextIndex();
                    var editorId = 'mbscctv_faq_answer_' + idx;
                    var html = '<div class="mbscctv-faq-row" style="background:#f9f9f9;border:1px solid #ddd;padding:15px;margin-bottom:12px;border-radius:4px;">'
                        + '<div style="margin-bottom:10px;"><label style="font-weight:600;display:block;margin-bottom:4px;">Pertanyaan</label>'
                        + '<input type="text" name="mbscctv_faq[' + idx + '][question]" value="" class="widefat" /></div>'
                        + '<div style="margin-bottom:10px;"><label style="font-weight:600;display:block;margin-bottom:4px;">Jawaban</label>'
                        + '<textarea id="' + editorId + '" name="mbscctv_faq[' + idx + '][answer]" rows="8" class="widefat mbscctv-faq-answer"></textarea></div>'
                        + '<button type="button" class="button mbscctv-faq-remove" style="color:#a00;">Hapus FAQ ini</button>'
                        + '</div>';
                    $(wrapper).append(html);

                    // Initialize WYSIWYG on new textarea
                    if (typeof wp !== 'undefined' && wp.editor) {
                        wp.editor.initialize(editorId, editorSettings);
                    }
                });

                // Remove FAQ row
                $(document).on('click', '.mbscctv-faq-remove', function() {
                    var row = $(this).closest('.mbscctv-faq-row');
                    var textarea = row.find('.mbscctv-faq-answer');
                    if (textarea.length && typeof wp !== 'undefined' && wp.editor) {
                        wp.editor.remove(textarea.attr('id'));
                    }
                    row.remove();
                });

                // Sync all TinyMCE editors before form submission
                $('#edittag').on('submit', function() {
                    if (typeof tinyMCE !== 'undefined') {
                        tinyMCE.triggerSave();
                    }
                });
            });
            </script>
        </td>
    </tr>
    <?php
}
add_action( 'product_cat_edit_form_fields', 'mbscctv_product_cat_faq_fields', 10, 1 );
add_action( 'product_brand_edit_form_fields', 'mbscctv_product_cat_faq_fields', 10, 1 );

/**
 * Add FAQ fields to product_cat "Add New" screen (plain textarea)
 *
 * Note: WYSIWYG is only on "Edit" screen because the "Add New" form
 * uses AJAX and resets after submit, which conflicts with TinyMCE.
 * Users can add formatted FAQ content when editing the category.
 */
function mbscctv_product_cat_faq_add_fields() {
    wp_nonce_field( 'mbscctv_save_faq', 'mbscctv_faq_nonce' );
    ?>
    <div class="form-field">
        <label>FAQ (Pertanyaan Umum)</label>
        <div id="mbscctv-faq-wrapper"></div>
        <p>
            <button type="button" class="button button-primary" id="mbscctv-faq-add">+ Tambah FAQ</button>
        </p>
        <p class="description">Tambahkan FAQ di sini (plain text), atau edit kategori setelah dibuat untuk menggunakan editor visual.</p>

        <script>
        (function(){
            var wrapper = document.getElementById('mbscctv-faq-wrapper');
            var addBtn  = document.getElementById('mbscctv-faq-add');
            var counter = 0;

            addBtn.addEventListener('click', function() {
                if (counter >= 20) { alert('Maksimal 20 FAQ.'); return; }
                var html = '<div class="mbscctv-faq-row" style="background:#f9f9f9;border:1px solid #ddd;padding:12px 15px;margin-bottom:10px;border-radius:4px;">'
                    + '<p style="margin:0 0 8px;"><label style="font-weight:600;display:block;margin-bottom:4px;">Pertanyaan</label>'
                    + '<input type="text" name="mbscctv_faq[' + counter + '][question]" value="" class="widefat" /></p>'
                    + '<p style="margin:0 0 8px;"><label style="font-weight:600;display:block;margin-bottom:4px;">Jawaban</label>'
                    + '<textarea name="mbscctv_faq[' + counter + '][answer]" rows="4" class="widefat"></textarea></p>'
                    + '<p style="margin:0;"><button type="button" class="button mbscctv-faq-remove" style="color:#a00;">Hapus</button></p>'
                    + '</div>';
                wrapper.insertAdjacentHTML('beforeend', html);
                counter++;
            });

            wrapper.addEventListener('click', function(e) {
                if (e.target.classList.contains('mbscctv-faq-remove')) {
                    e.target.closest('.mbscctv-faq-row').remove();
                }
            });
        })();
        </script>
    </div>
    <?php
}
add_action( 'product_cat_add_form_fields', 'mbscctv_product_cat_faq_add_fields', 10 );
add_action( 'product_brand_add_form_fields', 'mbscctv_product_cat_faq_add_fields', 10 );

/**
 * Save FAQ term meta
 */
function mbscctv_save_product_cat_faq( $term_id ) {
    // Verify nonce
    if ( ! isset( $_POST['mbscctv_faq_nonce'] ) || ! wp_verify_nonce( $_POST['mbscctv_faq_nonce'], 'mbscctv_save_faq' ) ) {
        return;
    }

    $faq_data = array();

    if ( ! empty( $_POST['mbscctv_faq'] ) && is_array( $_POST['mbscctv_faq'] ) ) {
        foreach ( $_POST['mbscctv_faq'] as $item ) {
            $question = isset( $item['question'] ) ? sanitize_text_field( $item['question'] ) : '';
            $answer   = isset( $item['answer'] ) ? wp_kses_post( $item['answer'] ) : '';

            // Only save non-empty FAQ items
            if ( ! empty( $question ) && ! empty( $answer ) ) {
                $faq_data[] = array(
                    'question' => $question,
                    'answer'   => $answer,
                );
            }
        }
    }

    update_term_meta( $term_id, '_mbscctv_faq', $faq_data );
}
add_action( 'edited_product_cat', 'mbscctv_save_product_cat_faq' );
add_action( 'created_product_cat', 'mbscctv_save_product_cat_faq' );
add_action( 'edited_product_brand', 'mbscctv_save_product_cat_faq' );
add_action( 'created_product_brand', 'mbscctv_save_product_cat_faq' );

/**
 * Output FAQ Schema (JSON-LD) for SEO
 */
function mbscctv_faq_schema() {
    if ( ! function_exists( 'is_product_category' ) ) {
        return;
    }

    if ( ! is_product_category() && ! is_tax( 'product_brand' ) ) {
        return;
    }

    $term      = get_queried_object();
    $faq_items = mbscctv_get_faq_items( $term );

    if ( empty( $faq_items ) ) {
        return;
    }

    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array(),
    );

    foreach ( $faq_items as $item ) {
        $schema['mainEntity'][] = array(
            '@type'          => 'Question',
            'name'           => $item['question'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => wp_strip_all_tags( $item['answer'] ),
            ),
        );
    }

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'mbscctv_faq_schema' );

/**
 * ============================================================
 * Sticky Sidebar + Off-Canvas for Categories & Brands (Desktop)
 * ============================================================
 */
function mbscctv_sticky_sidebar_offcanvas() {
    if ( is_front_page() ) {
        return;
    }

    if ( ! function_exists( 'wc_get_page_id' ) ) {
        return;
    }

    // Get product categories with thumbnails
    $categories = get_terms( array(
        'taxonomy'   => 'product_cat',
        'parent'     => 0,
        'hide_empty' => false,
    ) );

    // Get product brands with thumbnails
    $brands = get_terms( array(
        'taxonomy'   => 'product_brand',
        'parent'     => 0,
        'hide_empty' => false,
    ) );
    ?>

    <!-- Sticky Sidebar Buttons (Desktop only) -->
    <div id="mbscctv-sticky-sidebar" class="hidden lg:flex fixed right-0 top-1/2 -translate-y-1/2 z-40 flex-col gap-2">
        <!-- Kategori Button -->
        <button id="mbscctv-btn-kategori"
                class="group flex items-center gap-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 border-r-0 rounded-l-lg px-4 py-3 shadow-lg hover:bg-primary hover:text-white hover:border-primary transition-all duration-300"
                aria-label="Lihat Kategori">
            <span class="material-symbols-outlined text-xl text-primary group-hover:text-white transition-colors">category</span>
            <span class="text-xs font-bold uppercase tracking-wide group-hover:text-white transition-colors">Kategori</span>
        </button>

        <!-- Brand Button -->
        <button id="mbscctv-btn-brand"
                class="group flex items-center gap-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 border-r-0 rounded-l-lg px-4 py-3 shadow-lg hover:bg-primary hover:text-white hover:border-primary transition-all duration-300"
                aria-label="Lihat Brand">
            <span class="material-symbols-outlined text-xl text-primary group-hover:text-white transition-colors">verified</span>
            <span class="text-xs font-bold uppercase tracking-wide group-hover:text-white transition-colors">Brand</span>
        </button>
    </div>

    <!-- Off-Canvas Overlay -->
    <div id="mbscctv-offcanvas-overlay" class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300"></div>

    <!-- Off-Canvas Panel: Kategori -->
    <div id="mbscctv-offcanvas-kategori" class="fixed top-0 right-0 h-full w-full max-w-md bg-white dark:bg-slate-900 z-50 transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl">
        <div class="flex flex-col h-full">
            <!-- Header -->
            <div class="flex items-center justify-between p-5 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-2xl text-primary">category</span>
                    <h3 class="text-lg font-black">Kategori Produk</h3>
                </div>
                <button class="mbscctv-offcanvas-close size-10 flex items-center justify-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" aria-label="Tutup">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-5">
                <div class="grid grid-cols-2 gap-3">
                    <?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
                        <?php foreach ( $categories as $cat ) :
                            $cat_thumb_id  = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                            $cat_thumb_url = $cat_thumb_id ? wp_get_attachment_url( $cat_thumb_id ) : '';
                            $cat_icon      = mbscctv_get_category_icon( $cat->slug );
                        ?>
                            <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"
                               class="group flex flex-col items-center gap-3 p-4 rounded-lg border border-slate-200 dark:border-slate-700 hover:border-primary hover:shadow-md transition-all duration-300">
                                <?php if ( $cat_thumb_url ) : ?>
                                    <div class="size-16 rounded-lg overflow-hidden bg-slate-100 dark:bg-slate-800 flex-shrink-0">
                                        <img src="<?php echo esc_url( $cat_thumb_url ); ?>"
                                             alt="<?php echo esc_attr( $cat->name ); ?>"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" />
                                    </div>
                                <?php else : ?>
                                    <div class="size-16 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                        <span class="material-symbols-outlined text-3xl text-primary"><?php echo esc_html( $cat_icon ); ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="text-center">
                                    <p class="text-sm font-bold group-hover:text-primary transition-colors"><?php echo esc_html( $cat->name ); ?></p>
                                    <?php if ( $cat->count > 0 ) : ?>
                                        <p class="text-xs text-slate-400 mt-0.5"><?php echo esc_html( $cat->count ); ?> produk</p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-5 border-t border-slate-200 dark:border-slate-800">
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
                   class="flex items-center justify-center gap-2 w-full bg-primary text-white py-3 rounded-md font-bold text-sm hover:bg-primary/90 transition-all">
                    <span class="material-symbols-outlined text-lg">storefront</span>
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Off-Canvas Panel: Brand -->
    <div id="mbscctv-offcanvas-brand" class="fixed top-0 right-0 h-full w-full max-w-md bg-white dark:bg-slate-900 z-50 transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl">
        <div class="flex flex-col h-full">
            <!-- Header -->
            <div class="flex items-center justify-between p-5 border-b border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-2xl text-primary">verified</span>
                    <h3 class="text-lg font-black">Brand</h3>
                </div>
                <button class="mbscctv-offcanvas-close size-10 flex items-center justify-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors" aria-label="Tutup">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-5">
                <div class="grid grid-cols-2 gap-3">
                    <?php if ( ! empty( $brands ) && ! is_wp_error( $brands ) ) : ?>
                        <?php foreach ( $brands as $brand ) :
                            $brand_thumb_id  = get_term_meta( $brand->term_id, 'thumbnail_id', true );
                            $brand_thumb_url = $brand_thumb_id ? wp_get_attachment_url( $brand_thumb_id ) : '';
                        ?>
                            <a href="<?php echo esc_url( get_term_link( $brand ) ); ?>"
                               class="group flex flex-col items-center gap-3 p-4 rounded-lg border border-slate-200 dark:border-slate-700 hover:border-primary hover:shadow-md transition-all duration-300">
                                <?php if ( $brand_thumb_url ) : ?>
                                    <div class="size-16 rounded-lg overflow-hidden bg-white dark:bg-slate-800 flex-shrink-0 p-2 border border-slate-100 dark:border-slate-700">
                                        <img src="<?php echo esc_url( $brand_thumb_url ); ?>"
                                             alt="<?php echo esc_attr( $brand->name ); ?>"
                                             class="w-full h-full object-contain" />
                                    </div>
                                <?php else : ?>
                                    <div class="size-16 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                        <span class="material-symbols-outlined text-3xl text-primary">verified</span>
                                    </div>
                                <?php endif; ?>
                                <div class="text-center">
                                    <p class="text-sm font-bold group-hover:text-primary transition-colors"><?php echo esc_html( $brand->name ); ?></p>
                                    <?php if ( $brand->count > 0 ) : ?>
                                        <p class="text-xs text-slate-400 mt-0.5"><?php echo esc_html( $brand->count ); ?> produk</p>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="col-span-2 text-center py-8">
                            <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">info</span>
                            <p class="text-sm text-slate-400">Belum ada brand yang tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-5 border-t border-slate-200 dark:border-slate-800">
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
                   class="flex items-center justify-center gap-2 w-full bg-primary text-white py-3 rounded-md font-bold text-sm hover:bg-primary/90 transition-all">
                    <span class="material-symbols-outlined text-lg">storefront</span>
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Off-Canvas JavaScript -->
    <script>
    (function() {
        var overlay     = document.getElementById('mbscctv-offcanvas-overlay');
        var panelKat    = document.getElementById('mbscctv-offcanvas-kategori');
        var panelBrand  = document.getElementById('mbscctv-offcanvas-brand');
        var btnKat      = document.getElementById('mbscctv-btn-kategori');
        var btnBrand    = document.getElementById('mbscctv-btn-brand');
        var currentOpen = null;

        function openPanel(panel) {
            // Close other if open
            if (currentOpen && currentOpen !== panel) {
                currentOpen.classList.add('translate-x-full');
            }
            overlay.classList.remove('hidden');
            requestAnimationFrame(function() {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                panel.classList.remove('translate-x-full');
            });
            currentOpen = panel;
            document.body.style.overflow = 'hidden';
        }

        function closePanel() {
            if (!currentOpen) return;
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            currentOpen.classList.add('translate-x-full');
            setTimeout(function() {
                overlay.classList.add('hidden');
            }, 300);
            currentOpen = null;
            document.body.style.overflow = '';
        }

        if (btnKat)   btnKat.addEventListener('click', function()   { openPanel(panelKat); });
        if (btnBrand)  btnBrand.addEventListener('click', function()  { openPanel(panelBrand); });
        if (overlay)   overlay.addEventListener('click', closePanel);

        // Close buttons
        document.querySelectorAll('.mbscctv-offcanvas-close').forEach(function(btn) {
            btn.addEventListener('click', closePanel);
        });

        // ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closePanel();
        });
    })();
    </script>
    <?php
}
add_action( 'wp_footer', 'mbscctv_sticky_sidebar_offcanvas' );
