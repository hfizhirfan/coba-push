<?php
/**
 * Dedicated Admin Settings Panel for Brows by Veron.
 * Allows full visual editing of all content, texts, prices, and settings.
 *
 * @package BrowsByVeron
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Normalize WhatsApp number
 */
function mbscctv_sanitize_whatsapp_number( $number ) {
    $number = preg_replace( '/\D+/', '', (string) $number );
    if ( 0 === strpos( $number, '0' ) ) {
        $number = '62' . substr( $number, 1 );
    } elseif ( 0 === strpos( $number, '8' ) ) {
        $number = '62' . $number;
    }
    return $number ?: '6281234567890';
}

/**
 * Helper to get WhatsApp link
 */
function mbscctv_get_whatsapp_url( $message = '' ) {
    $number = mbscctv_sanitize_whatsapp_number( get_option( 'mbscctv_whatsapp_number', '6281234567890' ) );
    if ( '' === $message ) {
        $message = get_option(
            'mbscctv_whatsapp_message',
            'Halo Brows by Veron, saya ingin konsultasi dan booking jadwal treatment.'
        );
    }
    return 'https://wa.me/' . $number . ( $message ? '?text=' . rawurlencode( $message ) : '' );
}

/**
 * Register all settings
 */
function bv_register_theme_settings() {
    $fields = array(
        // WhatsApp & Contact
        'mbscctv_whatsapp_number',
        'mbscctv_whatsapp_message',
        'bv_studio_location',
        'bv_studio_sublocation',
        'bv_studio_hours',

        // Hero
        'bv_hero_welcome',
        'bv_hero_title_main',
        'bv_hero_title_italic',
        'bv_hero_subtitle',
        'bv_hero_badge_1',
        'bv_hero_badge_2_title',
        'bv_hero_badge_2_subtitle',
        'bv_hero_badge_3',
        'bv_hero_img_left',
        'bv_hero_img_center',
        'bv_hero_img_right',

        // About
        'bv_about_lead',
        'bv_about_bio_1',
        'bv_about_bio_2',
        'bv_about_stat_1_num',
        'bv_about_stat_1_label',
        'bv_about_stat_2_num',
        'bv_about_stat_2_label',
        'bv_about_stat_3_num',
        'bv_about_stat_3_label',

        // Services & Promise
        'bv_promise_1_title',
        'bv_promise_1_desc',
        'bv_promise_2_title',
        'bv_promise_2_desc',
        'bv_promise_3_title',
        'bv_promise_3_desc',

        // Price List
        'bv_price_ombre_price',
        'bv_price_ombre_strike',
        'bv_price_ombre_desc',
        'bv_price_mix_price',
        'bv_price_mix_strike',
        'bv_price_mix_desc',
        'bv_price_hairstroke_price',
        'bv_price_hairstroke_strike',
        'bv_price_hairstroke_desc',
        'bv_price_fluffy_price',
        'bv_price_fluffy_strike',
        'bv_price_fluffy_desc',
        'bv_price_men_price',
        'bv_price_men_desc',
        'bv_price_lips_price',
        'bv_price_lips_strike',
        'bv_price_lips_desc',

        // Terms 1-12
        'bv_term_1_title', 'bv_term_1_desc',
        'bv_term_2_title', 'bv_term_2_desc',
        'bv_term_3_title', 'bv_term_3_desc',
        'bv_term_4_title', 'bv_term_4_desc',
        'bv_term_5_title', 'bv_term_5_desc',
        'bv_term_6_title', 'bv_term_6_desc',
        'bv_term_7_title', 'bv_term_7_desc',
        'bv_term_8_title', 'bv_term_8_desc',
        'bv_term_9_title', 'bv_term_9_desc',
        'bv_term_10_title', 'bv_term_10_desc',
        'bv_term_11_title', 'bv_term_11_desc',
        'bv_term_12_title', 'bv_term_12_desc',

        // Quote & CTA
        'bv_quote_text',
        'bv_quote_subtext',
    );

    foreach ( $fields as $field ) {
        register_setting( 'bv_settings_group', $field );
    }
}
add_action( 'admin_init', 'bv_register_theme_settings' );

/**
 * Add Top-Level Menu in WP Admin Dashboard
 */
function bv_add_admin_menu() {
    add_menu_page(
        'Brows by Veron',
        'Brows by Veron',
        'manage_options',
        'browsbyveron-editor',
        'bv_render_settings_page',
        'dashicons-art',
        2
    );
}
add_action( 'admin_menu', 'bv_add_admin_menu' );

/**
 * Render Settings Page UI
 */
function bv_render_settings_page() {
    ?>
    <div class="wrap" style="max-width: 1100px; margin-top: 20px;">
        <div style="background: #241C18; color: #fff; padding: 24px 30px; border-radius: 12px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="color: #F7F4EE; font-family: Georgia, serif; font-size: 28px; margin: 0;">Brows by Veron — Pengaturan Konten Website</h1>
                <p style="color: #A68674; margin: 6px 0 0 0; font-size: 14px;">Ubah seluruh teks, harga treatment, promo, dan ketentuan studio langsung dari sini.</p>
            </div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="button" style="background: #6B4E3D; color: #fff; border: none; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                Lihat Website &rarr;
            </a>
        </div>

        <?php if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ) : ?>
            <div class="notice notice-success is-dismissible" style="border-left-color: #6B4E3D;">
                <p><strong>Perubahan berhasil disimpan!</strong> Website Anda telah diperbarui secara otomatis.</p>
            </div>
        <?php endif; ?>

        <style>
            .bv-admin-tabs { display: flex; gap: 8px; border-bottom: 2px solid #E0D6C8; margin-bottom: 20px; }
            .bv-tab-btn { background: #FAF7F2; border: 1px solid #E0D6C8; border-bottom: none; padding: 10px 18px; font-weight: 600; cursor: pointer; border-radius: 8px 8px 0 0; font-size: 13px; color: #6B5548; }
            .bv-tab-btn.active { background: #6B4E3D; color: #fff; border-color: #6B4E3D; }
            .bv-tab-content { display: none; background: #fff; border: 1px solid #E0D6C8; border-radius: 0 0 12px 12px; padding: 25px 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); }
            .bv-tab-content.active { display: block; }
            .bv-form-row { margin-bottom: 18px; }
            .bv-form-row label { display: block; font-weight: 600; color: #1E1815; margin-bottom: 6px; font-size: 13px; }
            .bv-form-row input[type="text"], .bv-form-row textarea { width: 100%; max-width: 650px; padding: 9px 12px; border: 1px solid #D1C7BA; border-radius: 6px; font-size: 14px; }
            .bv-form-row textarea { min-height: 80px; }
            .bv-form-row .description { color: #8C786A; font-size: 12px; margin-top: 4px; }
            .bv-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; max-width: 650px; }
            .bv-card-box { background: #FAF7F2; border: 1px solid #EAE3D8; border-radius: 10px; padding: 18px; margin-bottom: 18px; max-width: 650px; }
            .bv-card-box h3 { margin-top: 0; color: #6B4E3D; font-size: 16px; border-bottom: 1px solid #E0D6C8; padding-bottom: 8px; }
        </style>

        <form method="post" action="options.php">
            <?php settings_fields( 'bv_settings_group' ); ?>

            <div class="bv-admin-tabs">
                <button type="button" class="bv-tab-btn active" onclick="switchTab(event, 'tab-hero')">1. Hero &amp; Banner</button>
                <button type="button" class="bv-tab-btn" onclick="switchTab(event, 'tab-about')">2. About Veron</button>
                <button type="button" class="bv-tab-btn" onclick="switchTab(event, 'tab-pricing')">3. Price List &amp; Diskon</button>
                <button type="button" class="bv-tab-btn" onclick="switchTab(event, 'tab-promise')">4. Quality Promise</button>
                <button type="button" class="bv-tab-btn" onclick="switchTab(event, 'tab-terms')">5. Terms &amp; Conditions (12 Poin)</button>
                <button type="button" class="bv-tab-btn" onclick="switchTab(event, 'tab-contact')">6. WhatsApp &amp; Studio</button>
            </div>

            <!-- Tab 1: Hero -->
            <div id="tab-hero" class="bv-tab-content active">
                <h2 style="font-size: 18px; color: #1E1815; margin-top: 0;">Konten Bagian Hero (Atas)</h2>
                <div class="bv-form-row">
                    <label>Teks Sambutan</label>
                    <input type="text" name="bv_hero_welcome" value="<?php echo esc_attr( get_option( 'bv_hero_welcome', 'Welcome to' ) ); ?>">
                </div>
                <div class="bv-grid-2">
                    <div class="bv-form-row">
                        <label>Judul Utama</label>
                        <input type="text" name="bv_hero_title_main" value="<?php echo esc_attr( get_option( 'bv_hero_title_main', 'Brows' ) ); ?>">
                    </div>
                    <div class="bv-form-row">
                        <label>Judul Cursive / Italic</label>
                        <input type="text" name="bv_hero_title_italic" value="<?php echo esc_attr( get_option( 'bv_hero_title_italic', "by Veron's" ) ); ?>">
                    </div>
                </div>
                <div class="bv-form-row">
                    <label>Sub-judul Brand</label>
                    <input type="text" name="bv_hero_subtitle" value="<?php echo esc_attr( get_option( 'bv_hero_subtitle', 'BEAUTY STUDIO' ) ); ?>">
                </div>
                <div class="bv-card-box">
                    <h3>3 Kartu Prestasi Polaroid</h3>
                    <div class="bv-form-row">
                        <label>Badge Kiri</label>
                        <input type="text" name="bv_hero_badge_1" value="<?php echo esc_attr( get_option( 'bv_hero_badge_1', '3x Hairstroke Champion in 🇮🇩' ) ); ?>">
                    </div>
                    <div class="bv-form-row">
                        <label>Badge Tengah (Nama &amp; Gelar)</label>
                        <input type="text" name="bv_hero_badge_2_title" value="<?php echo esc_attr( get_option( 'bv_hero_badge_2_title', 'Veron' ) ); ?>" placeholder="Nama">
                        <input type="text" name="bv_hero_badge_2_subtitle" value="<?php echo esc_attr( get_option( 'bv_hero_badge_2_subtitle', 'Worldwide Championship PMU Artist' ) ); ?>" placeholder="Gelar" style="margin-top: 6px;">
                    </div>
                    <div class="bv-form-row">
                        <label>Badge Kanan</label>
                        <input type="text" name="bv_hero_badge_3" value="<?php echo esc_attr( get_option( 'bv_hero_badge_3',
        'bv_hero_img_left',
        'bv_hero_img_center',
        'bv_hero_img_right', 'TOP 5 Hairstroke Worldwide Championship 🏆' ) ); ?>">
                    </div>
                </div>
            </div>

            <!-- Tab 2: About -->
            <div id="tab-about" class="bv-tab-content">
                <h2 style="font-size: 18px; color: #1E1815; margin-top: 0;">Konten About the Artist (Biografi Veron)</h2>
                <div class="bv-form-row">
                    <label>Tagline / Lead Paragraf</label>
                    <textarea name="bv_about_lead"><?php echo esc_textarea( get_option( 'bv_about_lead', 'is a Worldwide Championship PMU Artist specializing in Hairstroke Category, worked by heart, passion, thoughtful practice and of course dedication quality.' ) ); ?></textarea>
                </div>
                <div class="bv-form-row">
                    <label>Paragraf 1 (Lokasi &amp; Tahun Berdiri)</label>
                    <textarea name="bv_about_bio_1"><?php echo esc_textarea( get_option( 'bv_about_bio_1', 'Established in 2021 and located in Surabaya City. But she often travels outside Surabaya to take jobs.' ) ); ?></textarea>
                </div>
                <div class="bv-form-row">
                    <label>Paragraf 2 (Ciri Khas)</label>
                    <textarea name="bv_about_bio_2"><?php echo esc_textarea( get_option( 'bv_about_bio_2', 'Browsbyveron is known for its natural result and refined technique.' ) ); ?></textarea>
                </div>
                <div class="bv-card-box">
                    <h3>3 Kotak Statistik</h3>
                    <div class="bv-grid-2">
                        <div>
                            <input type="text" name="bv_about_stat_1_num" value="<?php echo esc_attr( get_option( 'bv_about_stat_1_num', 'Est. 2021' ) ); ?>">
                            <input type="text" name="bv_about_stat_1_label" value="<?php echo esc_attr( get_option( 'bv_about_stat_1_label', 'Surabaya City' ) ); ?>" style="margin-top: 4px;">
                        </div>
                        <div>
                            <input type="text" name="bv_about_stat_2_num" value="<?php echo esc_attr( get_option( 'bv_about_stat_2_num', 'Worldwide' ) ); ?>">
                            <input type="text" name="bv_about_stat_2_label" value="<?php echo esc_attr( get_option( 'bv_about_stat_2_label', 'TOP 5 Champion' ) ); ?>" style="margin-top: 4px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Price List -->
            <div id="tab-pricing" class="bv-tab-content">
                <h2 style="font-size: 18px; color: #1E1815; margin-top: 0;">Daftar Harga &amp; Promo Diskon (Price List)</h2>

                <!-- 1. Ombre Powder -->
                <div class="bv-card-box">
                    <h3>1. Ombre Powder</h3>
                    <div class="bv-grid-2">
                        <div class="bv-form-row">
                            <label>Harga Promo (ribu rupiah)</label>
                            <input type="text" name="bv_price_ombre_price" value="<?php echo esc_attr( get_option( 'bv_price_ombre_price', '2.500' ) ); ?>">
                        </div>
                        <div class="bv-form-row">
                            <label>Harga Normal Coret</label>
                            <input type="text" name="bv_price_ombre_strike" value="<?php echo esc_attr( get_option( 'bv_price_ombre_strike', '3.000' ) ); ?>">
                        </div>
                    </div>
                    <div class="bv-form-row">
                        <label>Deskripsi</label>
                        <input type="text" name="bv_price_ombre_desc" value="<?php echo esc_attr( get_option( 'bv_price_ombre_desc', 'FULL POWDER, LOOK SEPERTI MEMAKAI PENSIL ALIS' ) ); ?>">
                    </div>
                </div>

                <!-- 2. Hairstroke Mix Powder -->
                <div class="bv-card-box">
                    <h3>2. Hairstroke Mix Powder (Popular Choice)</h3>
                    <div class="bv-grid-2">
                        <div class="bv-form-row">
                            <label>Harga Promo (ribu rupiah)</label>
                            <input type="text" name="bv_price_mix_price" value="<?php echo esc_attr( get_option( 'bv_price_mix_price', '2.800' ) ); ?>">
                        </div>
                        <div class="bv-form-row">
                            <label>Harga Normal Coret</label>
                            <input type="text" name="bv_price_mix_strike" value="<?php echo esc_attr( get_option( 'bv_price_mix_strike', '3.800' ) ); ?>">
                        </div>
                    </div>
                    <div class="bv-form-row">
                        <label>Deskripsi</label>
                        <input type="text" name="bv_price_mix_desc" value="<?php echo esc_attr( get_option( 'bv_price_mix_desc', 'KOMBINASI ANTARA OMBRE & HAIRSTROKE, HAIRSTROKE DI BAGIAN DEPAN & POWDER DI BELAKANG' ) ); ?>">
                    </div>
                </div>

                <!-- 3. Hairstroke -->
                <div class="bv-card-box">
                    <h3>3. Hairstroke</h3>
                    <div class="bv-grid-2">
                        <div class="bv-form-row">
                            <label>Harga Promo (ribu rupiah)</label>
                            <input type="text" name="bv_price_hairstroke_price" value="<?php echo esc_attr( get_option( 'bv_price_hairstroke_price', '3.200' ) ); ?>">
                        </div>
                        <div class="bv-form-row">
                            <label>Harga Normal Coret</label>
                            <input type="text" name="bv_price_hairstroke_strike" value="<?php echo esc_attr( get_option( 'bv_price_hairstroke_strike', '4.000' ) ); ?>">
                        </div>
                    </div>
                    <div class="bv-form-row">
                        <label>Deskripsi</label>
                        <input type="text" name="bv_price_hairstroke_desc" value="<?php echo esc_attr( get_option( 'bv_price_hairstroke_desc', 'CLEAN & FULL HAIRSTROKE, SERAT BULU ASLI & BULU ALIS TAMPAK FULL & RAPI' ) ); ?>">
                    </div>
                </div>

                <!-- 4. Fluffy Hairstroke -->
                <div class="bv-card-box">
                    <h3>4. Fluffy Hairstroke</h3>
                    <div class="bv-grid-2">
                        <div class="bv-form-row">
                            <label>Harga Promo (ribu rupiah)</label>
                            <input type="text" name="bv_price_fluffy_price" value="<?php echo esc_attr( get_option( 'bv_price_fluffy_price', '3.500' ) ); ?>">
                        </div>
                        <div class="bv-form-row">
                            <label>Harga Normal Coret</label>
                            <input type="text" name="bv_price_fluffy_strike" value="<?php echo esc_attr( get_option( 'bv_price_fluffy_strike', '4.000' ) ); ?>">
                        </div>
                    </div>
                    <div class="bv-form-row">
                        <label>Deskripsi</label>
                        <input type="text" name="bv_price_fluffy_desc" value="<?php echo esc_attr( get_option( 'bv_price_fluffy_desc', 'FULL HAIRSTROKE & ADA PENAMBAHAN BABY HAIR, ALIS TAMPAK LEBIH PADAT' ) ); ?>">
                    </div>
                </div>

                <!-- 5. Hairstroke for Men -->
                <div class="bv-card-box">
                    <h3>5. Hairstroke for Men</h3>
                    <div class="bv-form-row">
                        <label>Harga (ribu rupiah)</label>
                        <input type="text" name="bv_price_men_price" value="<?php echo esc_attr( get_option( 'bv_price_men_price', '3.800' ) ); ?>">
                    </div>
                    <div class="bv-form-row">
                        <label>Deskripsi</label>
                        <input type="text" name="bv_price_men_desc" value="<?php echo esc_attr( get_option( 'bv_price_men_desc', 'FULL HAIRSTROKE DENGAN DESIGN KHUSUS PRIA' ) ); ?>">
                    </div>
                </div>

                <!-- 6. Lips Sulam Bibir -->
                <div class="bv-card-box">
                    <h3>6. Lips Sulam Bibir</h3>
                    <div class="bv-grid-2">
                        <div class="bv-form-row">
                            <label>Harga Promo (ribu rupiah)</label>
                            <input type="text" name="bv_price_lips_price" value="<?php echo esc_attr( get_option( 'bv_price_lips_price', '3.000' ) ); ?>">
                        </div>
                        <div class="bv-form-row">
                            <label>Harga Normal Coret</label>
                            <input type="text" name="bv_price_lips_strike" value="<?php echo esc_attr( get_option( 'bv_price_lips_strike', '3.500' ) ); ?>">
                        </div>
                    </div>
                    <div class="bv-form-row">
                        <label>Deskripsi</label>
                        <input type="text" name="bv_price_lips_desc" value="<?php echo esc_attr( get_option( 'bv_price_lips_desc', 'SULAM BIBIR NATURAL DENGAN WARNA SEGAR MERONA ALAMI & KOREKSI WARNA GELAP' ) ); ?>">
                    </div>
                </div>
            </div>

            <!-- Tab 4: Quality Promise -->
            <div id="tab-promise" class="bv-tab-content">
                <h2 style="font-size: 18px; color: #1E1815; margin-top: 0;">3 Standar Kualitas &amp; Keamanan</h2>
                <div class="bv-card-box">
                    <h3>Standar 1</h3>
                    <input type="text" name="bv_promise_1_title" value="<?php echo esc_attr( get_option( 'bv_promise_1_title', 'Use high quality products' ) ); ?>" style="margin-bottom: 6px;">
                    <textarea name="bv_promise_1_desc"><?php echo esc_textarea( get_option( 'bv_promise_1_desc', 'Seluruh produk perawatan dan kebersihan berstandar internasional tertinggi.' ) ); ?></textarea>
                </div>
                <div class="bv-card-box">
                    <h3>Standar 2</h3>
                    <input type="text" name="bv_promise_2_title" value="<?php echo esc_attr( get_option( 'bv_promise_2_title', 'Use new needle for each clients' ) ); ?>" style="margin-bottom: 6px;">
                    <textarea name="bv_promise_2_desc"><?php echo esc_textarea( get_option( 'bv_promise_2_desc', '100% Jarum dan cartridge mikro steril sekali pakai (disposable single-use).' ) ); ?></textarea>
                </div>
                <div class="bv-card-box">
                    <h3>Standar 3</h3>
                    <input type="text" name="bv_promise_3_title" value="<?php echo esc_attr( get_option( 'bv_promise_3_title', 'Use best pigment from US, Vietnam, Korea & Thailand' ) ); ?>" style="margin-bottom: 6px;">
                    <textarea name="bv_promise_3_desc"><?php echo esc_textarea( get_option( 'bv_promise_3_desc', 'Pigmen impor organik terbaik yang memudar natural tanpa berubah merah atau kebiruan.' ) ); ?></textarea>
                </div>
            </div>

            <!-- Tab 5: Terms -->
            <div id="tab-terms" class="bv-tab-content">
                <h2 style="font-size: 18px; color: #1E1815; margin-top: 0;">12 Poin Terms &amp; Conditions</h2>
                <?php
                $terms_defaults = array(
                    1 => array( '1. Booking & Down Payment (DP)', 'Appointment hanya dapat dikonfirmasi setelah pembayaran DP diterima. No DP = No Booking Confirmation.' ),
                    2 => array( '2. Keterlambatan', 'Batas toleransi keterlambatan maksimal 15 menit dari waktu yang telah dijadwalkan. Keterlambatan lebih dari 15 menit akan otomatis dijadwalkan ulang (reschedule).' ),
                    3 => array( '3. Kebijakan Reschedule', 'Reschedule diperbolehkan maksimal 2 kali. Lebih dari 2 kali reschedule, DP dinyatakan hangus dan diperlukan DP baru untuk booking ulang.' ),
                    4 => array( '4. Riwayat Treatment Sebelumnya', 'Client yang pernah melakukan sulam alis atau sulam bibir sebelumnya wajib mengirimkan foto kondisi terkini tanpa makeup untuk evaluasi terlebih dahulu.' ),
                    5 => array( '5. Kondisi Kehamilan & Menyusui', 'Client dalam kondisi hamil atau menyusui diwajibkan untuk konfirmasi dan konsultasi terlebih dahulu sebelum melakukan treatment.' ),
                    6 => array( '6. Riwayat Kesehatan', 'Client dengan riwayat penyakit tertentu wajib konsultasi terlebih dahulu melalui admin demi keamanan dan kenyamanan treatment.' ),
                    7 => array( '7. Pendampingan Selama Treatment', 'Demi kenyamanan dan kebersihan area kerja privat, client tidak diperkenankan membawa anak kecil maupun teman saat treatment berlangsung.' ),
                    8 => array( '8. Usia Minimum', 'Minimal usia 18 tahun atau dengan persetujuan tertulis orang tua.' ),
                    9 => array( '9. Pre & Aftercare Procedure', 'Client wajib mengikuti prosedur sebelum dan sesudah treatment sesuai arahan untuk memastikan hasil optimal dan proses healing yang baik.' ),
                    10 => array( '10. Retouch Policy', 'Client akan mendapatkan FREE retouch 1x dalam jangka waktu 1-2 bulan setelah treatment pertama. Retouch tahunan yang dilakukan sebelum 2 tahun berhak mendapatkan diskon 50% dari harga normal.' ),
                    11 => array( '11. Refund Policy', 'DP tidak dapat dikembalikan (non-refundable). Pembatalan H-1 atau di hari yang sama menyebabkan DP hangus.' ),
                    12 => array( '12. Patch Test & Allergic Reaction', 'Disarankan melakukan patch test minimal 24 jam sebelum treatment (jika diperlukan). Reaksi alergi di luar kendali teknisi bukan tanggung jawab pihak BROWSBYVERON.' ),
                );

                for ( $i = 1; $i <= 12; $i++ ) {
                    $t_title = get_option( "bv_term_{$i}_title", $terms_defaults[$i][0] );
                    $t_desc  = get_option( "bv_term_{$i}_desc", $terms_defaults[$i][1] );
                    ?>
                    <div class="bv-card-box">
                        <h3>Poin <?php echo $i; ?></h3>
                        <input type="text" name="bv_term_<?php echo $i; ?>_title" value="<?php echo esc_attr( $t_title ); ?>" style="margin-bottom: 6px;">
                        <textarea name="bv_term_<?php echo $i; ?>_desc"><?php echo esc_textarea( $t_desc ); ?></textarea>
                    </div>
                    <?php
                }
                ?>
            </div>

            <!-- Tab 6: Contact & WhatsApp -->
            <div id="tab-contact" class="bv-tab-content">
                <h2 style="font-size: 18px; color: #1E1815; margin-top: 0;">Pengaturan WhatsApp &amp; Studio</h2>
                <div class="bv-form-row">
                    <label>Nomor WhatsApp</label>
                    <input type="text" name="mbscctv_whatsapp_number" value="<?php echo esc_attr( get_option( 'mbscctv_whatsapp_number', '6281234567890' ) ); ?>">
                    <p class="description">Boleh ditulis 0812... atau 62812...</p>
                </div>
                <div class="bv-form-row">
                    <label>Pesan Default Saat Chat WhatsApp</label>
                    <textarea name="mbscctv_whatsapp_message"><?php echo esc_textarea( get_option( 'mbscctv_whatsapp_message', 'Halo Brows by Veron, saya ingin konsultasi dan booking jadwal treatment.' ) ); ?></textarea>
                </div>
                <div class="bv-form-row">
                    <label>Lokasi Studio</label>
                    <input type="text" name="bv_studio_location" value="<?php echo esc_attr( get_option( 'bv_studio_location', 'Surabaya City, Indonesia' ) ); ?>">
                </div>
                <div class="bv-form-row">
                    <label>Keterangan Tambahan Lokasi</label>
                    <input type="text" name="bv_studio_sublocation" value="<?php echo esc_attr( get_option( 'bv_studio_sublocation', '(Often travels outside Surabaya)' ) ); ?>">
                </div>
                <div class="bv-form-row">
                    <label>Jadwal Operasional</label>
                    <input type="text" name="bv_studio_hours" value="<?php echo esc_attr( get_option( 'bv_studio_hours', 'By Appointment Only' ) ); ?>">
                </div>
                <div class="bv-form-row">
                    <label>Quote Penutup</label>
                    <input type="text" name="bv_quote_text" value="<?php echo esc_attr( get_option( 'bv_quote_text', '“Beauty begins the moment you decide to be yourself”' ) ); ?>">
                </div>
            </div>

            <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #E0D6C8;">
                <input type="submit" class="button button-primary button-large" value="Simpan Semua Perubahan" style="background: #6B4E3D; border-color: #523B2D; font-size: 15px; padding: 6px 25px; height: auto;">
            </div>
        </form>

        <script>
            function switchTab(evt, tabId) {
                var contents = document.getElementsByClassName('bv-tab-content');
                for (var i = 0; i < contents.length; i++) {
                    contents[i].classList.remove('active');
                }
                var buttons = document.getElementsByClassName('bv-tab-btn');
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].classList.remove('active');
                }
                document.getElementById(tabId).classList.add('active');
                evt.currentTarget.classList.add('active');
            }
        </script>
    </div>
    <?php
}
