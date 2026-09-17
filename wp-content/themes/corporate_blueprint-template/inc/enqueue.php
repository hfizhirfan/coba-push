<?php
/**
 * Theme styles and scripts for Brows by Veron.
 *
 * @package BrowsByVeron
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue Styles & Scripts
 */
function mbscctv_scripts() {
    // Google Fonts (Merriweather for Headings, Plus Jakarta Sans & Poppins for Sans Body)
    wp_enqueue_style(
        'browsbyveron-google-fonts',
        'https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,300..700;1,300..700&display=swap',
        array(),
        null
    );

    // Material Symbols Outlined
    wp_enqueue_style(
        'browsbyveron-material-symbols',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
        array(),
        null
    );

    // FontAwesome Icons CDN
    wp_enqueue_style(
        'browsbyveron-fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Tailwind CSS via CDN
    wp_enqueue_script(
        'tailwindcss',
        'https://cdn.tailwindcss.com?plugins=forms,container-queries',
        array(),
        null,
        false
    );

    // Tailwind Configuration (Merriweather Serif & Plus Jakarta Sans / Poppins Palette)
    wp_add_inline_script( 'tailwindcss', '
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        bv: {
                            bg: "#F7F4EE",
                            "bg-soft": "#EFEAE0",
                            "bg-deep": "#E5DEC8",
                            card: "#FFFFFF",
                            ink: "#1E1815",
                            brown: "#6B4E3D",
                            "brown-dark": "#523B2D",
                            "brown-light": "#8D6B56",
                            "brown-soft": "#ECE3D9",
                            taupe: "#A68674",
                            muted: "#6B5548",
                            border: "#E0D6C8",
                            "border-light": "#EDE6DC",
                            discount: "#C75252",
                            footer: "#241C18",
                        },
                        primary: "#6B4E3D",
                        accent: "#8D6B56",
                    },
                    fontFamily: {
                        sans: ["Plus Jakarta Sans", "Poppins", "ui-sans-serif", "system-ui", "-apple-system", "BlinkMacSystemFont", "Segoe UI", "sans-serif"],
                        serif: ["Merriweather", "Georgia", "serif"],
                        display: ["Merriweather", "Georgia", "serif"],
                        quote: ["Georgia", "Merriweather", "serif"],
                    },
                    borderRadius: {
                        "card": "1.25rem",
                        "pill": "9999px",
                    },
                    boxShadow: {
                        "bv": "0 10px 30px -5px rgba(107, 78, 61, 0.10)",
                        "bv-hover": "0 20px 35px -5px rgba(107, 78, 61, 0.18)",
                        "bv-soft": "0 4px 20px rgba(107, 78, 61, 0.06)",
                    }
                },
            },
        }
    ' );

    // Theme Stylesheets
    wp_enqueue_style( 'browsbyveron-style', get_stylesheet_uri(), array(), MBSCCTV_VERSION );
    wp_enqueue_style(
        'browsbyveron-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array( 'browsbyveron-style' ),
        MBSCCTV_VERSION
    );

    // Theme JS
    wp_enqueue_script(
        'browsbyveron-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        MBSCCTV_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'mbscctv_scripts' );

/**
 * Enqueue editor styles & assets for Gutenberg WYSIWYG
 */
function mbscctv_editor_assets() {
    // Google Fonts in Editor
    wp_enqueue_style(
        'browsbyveron-google-fonts-editor',
        'https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,300..700;1,300..700&display=swap',
        array(),
        null
    );

    // FontAwesome in Editor
    wp_enqueue_style(
        'browsbyveron-fontawesome-editor',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array(),
        '6.5.1'
    );

    // Main Stylesheet and Editor Custom Stylesheet
    wp_enqueue_style( 'browsbyveron-style', get_stylesheet_uri(), array(), MBSCCTV_VERSION );
    wp_enqueue_style( 'bv-editor-style', get_template_directory_uri() . '/assets/css/editor-style.css', array(), MBSCCTV_VERSION );
    wp_enqueue_style( 'browsbyveron-main', get_template_directory_uri() . '/assets/css/main.css', array(), MBSCCTV_VERSION );
}
add_action( 'enqueue_block_editor_assets', 'mbscctv_editor_assets' );
