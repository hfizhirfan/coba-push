<?php
/**
 * Content fields for the homepage. PHP templates remain the layout authority.
 *
 * A dynamic block stores content only, so Gutenberg never validates hand-written
 * template HTML against a core block's save function.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function bv_home_sections() {
    return array(
        'hero'     => array( 'title' => 'Hero / Banner', 'template' => 'hero' ),
        'about'    => array( 'title' => 'About Veron', 'template' => 'about' ),
        'services' => array( 'title' => 'Services', 'template' => 'pillars' ),
        'pricing'  => array( 'title' => 'Price List', 'template' => 'pricing' ),
        'gallery'  => array( 'title' => 'Results Gallery', 'template' => 'gallery' ),
        'terms'    => array( 'title' => 'Term & Conditions', 'template' => 'faq' ),
        'contact'  => array( 'title' => 'Contact / Booking', 'template' => 'cta-banner' ),
    );
}

function bv_home_template_html( $section ) {
    $sections = bv_home_sections();
    if ( ! isset( $sections[ $section ] ) ) {
        return '';
    }
    ob_start();
    get_template_part( 'template-parts/home/' . $sections[ $section ]['template'] );
    return ob_get_clean();
}

function bv_home_inline_tags() {
    return array( 'strong' => array(), 'b' => array(), 'em' => array(), 'i' => array(), 'br' => array() );
}

/**
 * Derive fields from the real template, retaining decorative spans and icons.
 * IDs are based on DOM paths, independent of the text or image being edited.
 * When changing template structure, migrate stored field IDs as well.
 */
function bv_home_document( $html ) {
    $dom = new DOMDocument( '1.0', 'UTF-8' );
    $previous = libxml_use_internal_errors( true );
    $dom->loadHTML( '<?xml encoding="UTF-8"><!DOCTYPE html><html><body>' . $html . '</body></html>' );
    libxml_clear_errors();
    libxml_use_internal_errors( $previous );
    $fields = array();
    $nodes = array();
    $group = 'Konten';
    $walk = function( $node ) use ( &$walk, &$fields, &$nodes, &$group ) {
        if ( $node instanceof DOMElement && in_array( $node->tagName, array( 'script', 'style', 'svg', 'i' ), true ) ) {
            return;
        }
        $type = null;
        $value = '';
        $label = 'Teks';
        if ( $node instanceof DOMElement && 'img' === $node->tagName ) {
            $type = 'image';
            $value = $node->getAttribute( 'src' );
            $label = $node->getAttribute( 'alt' ) ?: 'Gambar';
        } elseif ( $node instanceof DOMText && preg_match( '/[\p{L}\p{N}]/u', $node->nodeValue ) ) {
            $type = 'text';
            $value = trim( $node->nodeValue );
        } elseif ( $node instanceof DOMElement && preg_match( '/[\p{L}\p{N}]/u', $node->textContent ) ) {
            $inline = true;
            foreach ( $node->getElementsByTagName( '*' ) as $child ) {
                if ( ! array_key_exists( $child->tagName, bv_home_inline_tags() ) || $child->hasAttributes() ) {
                    $inline = false;
                    break;
                }
            }
            if ( $inline && in_array( $node->tagName, array( 'p', 'h1', 'h2', 'h3', 'h4', 'span', 'strong', 'div', 'a', 'button', 'li' ), true ) ) {
                $type = 'richtext';
                foreach ( $node->childNodes as $child ) {
                    $value .= $node->ownerDocument->saveHTML( $child );
                }
                $value = trim( $value );
            }
        }
        if ( $type ) {
            if ( $node instanceof DOMElement && preg_match( '/^h[1-6]$/', $node->tagName ) ) {
                $group = trim( $node->textContent );
                $label = 'Judul';
            }
            $key = 'f_' . substr( hash( 'sha256', $node->getNodePath() ), 0, 16 );
            $fields[ $key ] = array( 'type' => $type, 'label' => $label, 'group' => $group, 'value' => $value );
            $nodes[ $key ] = $node;
            return;
        }
        foreach ( $node->childNodes as $child ) {
            $walk( $child );
        }
    };
    $walk( $dom->getElementsByTagName( 'body' )->item( 0 ) );
    return array( 'dom' => $dom, 'fields' => $fields, 'nodes' => $nodes );
}

/** Send the real template tree to React, marking only its editable leaves. */
function bv_home_editor_tree( $document ) {
    $field_paths = array();
    foreach ( $document['nodes'] as $key => $node ) {
        $field_paths[ $node->getNodePath() ] = $key;
    }
    $walk = function( $node ) use ( &$walk, $field_paths ) {
        if ( $node instanceof DOMComment || ( $node instanceof DOMElement && in_array( $node->tagName, array( 'script', 'style' ), true ) ) ) {
            return null;
        }
        $field = $field_paths[ $node->getNodePath() ] ?? null;
        if ( $node instanceof DOMText ) {
            return $field ? array( 'tag' => '#text', 'field' => $field, 'text' => $node->nodeValue ) : $node->nodeValue;
        }
        if ( ! $node instanceof DOMElement ) {
            return null;
        }
        $tree = array( 'tag' => $node->tagName, 'attrs' => array(), 'children' => array() );
        foreach ( $node->attributes as $attribute ) {
            $tree['attrs'][ $attribute->name ] = $attribute->value;
        }
        if ( $field ) {
            $tree['field'] = $field;
        } else {
            foreach ( $node->childNodes as $child ) {
                $value = $walk( $child );
                if ( null !== $value ) {
                    $tree['children'][] = $value;
                }
            }
        }
        return $tree;
    };
    $trees = array();
    foreach ( $document['dom']->getElementsByTagName( 'body' )->item( 0 )->childNodes as $node ) {
        $tree = $walk( $node );
        if ( null !== $tree ) {
            $trees[] = $tree;
        }
    }
    return $trees;
}

function bv_home_saved_values( $section ) {
    $page = get_queried_object();
    if ( ! $page instanceof WP_Post ) {
        return array();
    }
    foreach ( parse_blocks( $page->post_content ) as $block ) {
        if ( 'browsbyveron/home-section' === $block['blockName'] && $section === ( $block['attrs']['section'] ?? '' ) ) {
            return (array) ( $block['attrs']['values'] ?? array() );
        }
    }
    return array();
}

/** Apply content only; classes, wrappers, links, and interactive controls stay intact. */
function bv_home_apply_values( $html, $values ) {
    if ( ! $values ) {
        return $html;
    }
    $document = bv_home_document( $html );
    $changed = false;
    foreach ( $document['fields'] as $key => $field ) {
        if ( ! array_key_exists( $key, $values ) || ! is_string( $values[ $key ] ) ) {
            continue;
        }
        $node = $document['nodes'][ $key ];
        $value = $values[ $key ];
        // WordPress KSES entity-encodes string attributes when a page is saved.
        if ( 'richtext' !== $field['type'] ) {
            $value = html_entity_decode( $value, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
        }
        if ( $value === $field['value'] ) {
            continue;
        }
        if ( 'image' === $field['type'] ) {
            $url = esc_url_raw( $value, array( 'http', 'https' ) );
            if ( ! $url ) {
                continue;
            }
            $node->setAttribute( 'src', $url );
            // Templates currently have no srcset; do not retain a stale one if added.
            $node->removeAttribute( 'srcset' );
            $node->removeAttribute( 'sizes' );
        } elseif ( 'text' === $field['type'] ) {
            preg_match( '/^(\s*)[\s\S]*?(\s*)$/u', $node->nodeValue, $spacing );
            $node->nodeValue = $spacing[1] . sanitize_text_field( $value ) . $spacing[2];
        } else {
            $value = wp_kses( $value, bv_home_inline_tags() );
            $fragment_doc = bv_home_document_fragment( $value );
            while ( $node->firstChild ) {
                $node->removeChild( $node->firstChild );
            }
            foreach ( iterator_to_array( $fragment_doc->getElementsByTagName( 'body' )->item( 0 )->childNodes ) as $child ) {
                $node->appendChild( $document['dom']->importNode( $child, true ) );
            }
        }
        $changed = true;
    }
    if ( ! $changed ) {
        return $html;
    }
    // Keep structured FAQ answers consistent with edited visible terms.
    $xpath = new DOMXPath( $document['dom'] );
    $faq_scripts = $xpath->query( '//section[@id="terms"]/script[@type="application/ld+json"]' );
    if ( $faq_scripts->length ) {
        $questions = array();
        foreach ( $xpath->query( '//section[@id="terms"]//div[contains(concat(" ", normalize-space(@class), " "), " bv-term-item ")]' ) as $item ) {
            $title = $xpath->query( './/button/span[1]', $item )->item( 0 );
            $answer = $xpath->query( './div[contains(concat(" ", normalize-space(@class), " "), " bv-term-content ")]', $item )->item( 0 );
            if ( $title && $answer ) {
                $questions[] = array( '@type' => 'Question', 'name' => trim( $title->textContent ), 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => trim( $answer->textContent ) ) );
            }
        }
        $faq_scripts->item( 0 )->nodeValue = wp_json_encode( array( '@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $questions ), JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT );
    }
    $output = '';
    foreach ( $document['dom']->getElementsByTagName( 'body' )->item( 0 )->childNodes as $child ) {
        $output .= $document['dom']->saveHTML( $child );
    }
    return $output;
}

function bv_home_document_fragment( $html ) {
    $dom = new DOMDocument( '1.0', 'UTF-8' );
    $previous = libxml_use_internal_errors( true );
    $dom->loadHTML( '<?xml encoding="UTF-8"><html><body>' . $html . '</body></html>' );
    libxml_clear_errors();
    libxml_use_internal_errors( $previous );
    return $dom;
}

function bv_render_home_section( $section ) {
    echo bv_home_apply_values( bv_home_template_html( $section ), bv_home_saved_values( $section ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- template markup; fields sanitized above.
}

function bv_register_home_editor() {
    $script = '/assets/js/home-editor.js';
    wp_register_script( 'bv-home-editor', get_template_directory_uri() . $script, array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components' ), filemtime( get_template_directory() . $script ), true );
    $style = '/assets/css/home-editor.css';
    wp_register_style( 'bv-home-editor', get_template_directory_uri() . $style, array(), filemtime( get_template_directory() . $style ) );
    register_block_type( 'browsbyveron/home-section', array(
        'api_version' => 3,
        'editor_script' => 'bv-home-editor',
        'editor_style' => 'bv-home-editor',
        'attributes' => array(
            'section' => array( 'type' => 'string', 'default' => 'hero' ),
            'values' => array( 'type' => 'object', 'default' => array() ),
        ),
        'render_callback' => function( $attributes ) {
            return bv_home_apply_values( bv_home_template_html( $attributes['section'] ), $attributes['values'] );
        },
    ) );
}
add_action( 'init', 'bv_register_home_editor' );

function bv_home_editor_assets() {
    wp_enqueue_media();
    wp_enqueue_script( 'bv-home-editor' );
    wp_enqueue_style( 'bv-home-editor' );

    $sections = bv_home_sections();
    foreach ( $sections as $section => &$config ) {
        $document = bv_home_document( bv_home_template_html( $section ) );
        $config['fields'] = $document['fields'];
        $config['tree'] = bv_home_editor_tree( $document );
        unset( $config['template'] );
    }
    unset( $config );
    wp_add_inline_script( 'bv-home-editor', 'window.bvHomeEditor = ' . wp_json_encode( $sections ) . ';', 'before' );
}
add_action( 'enqueue_block_editor_assets', 'bv_home_editor_assets' );

function bv_home_editor_settings( $settings, $context ) {
    if ( isset( $context->post ) && (int) get_option( 'page_on_front' ) === $context->post->ID && has_block( 'browsbyveron/home-section', $context->post ) ) {
        $settings['templateLock'] = 'all';
        $settings['canLockBlocks'] = false;
        $settings['codeEditingEnabled'] = false;
    }
    return $settings;
}
add_filter( 'block_editor_settings_all', 'bv_home_editor_settings', 10, 2 );

/** Build content from the current website, not a second set of sample defaults. */
function bv_get_home_editor_content() {
    $blocks = array();
    foreach ( bv_home_sections() as $section => $config ) {
        $document = bv_home_document( bv_home_template_html( $section ) );
        $blocks[] = get_comment_delimited_block_content( 'browsbyveron/home-section', array(
            'section' => $section,
            'values' => array_map( function( $field ) { return $field['value']; }, $document['fields'] ),
            'lock' => array( 'move' => true, 'remove' => true ),
            'metadata' => array( 'name' => $config['title'] ),
        ), '' );
    }
    return implode( "\n\n", $blocks );
}

/** Back up and migrate the existing homepage once; never regenerate saved edits. */
function bv_migrate_home_editor( $page_id ) {
    $page = get_post( $page_id );
    if ( ! $page || 'page' !== $page->post_type ) {
        return new WP_Error( 'bv_page', 'Halaman Home tidak ditemukan.' );
    }
    if ( has_block( 'browsbyveron/home-section', $page ) ) {
        return $page_id;
    }
    // Only migrate the known legacy structure. Keep unexpected content untouched.
    $legacy = parse_blocks( bv_get_legacy_gutenberg_content() );
    $saved = parse_blocks( $page->post_content );
    $text = function( $blocks ) use ( &$text ) {
        $result = array();
        foreach ( $blocks as $block ) {
            if ( in_array( $block['blockName'], array( 'core/paragraph', 'core/heading', 'core/list', 'core/button' ), true ) ) {
                $result[] = trim( wp_strip_all_tags( $block['innerHTML'] ) );
            } else {
                $result = array_merge( $result, $text( $block['innerBlocks'] ) );
            }
        }
        return $result;
    };
    if ( $text( $saved ) !== $text( $legacy ) ) {
        return new WP_Error( 'bv_custom_content', 'Konten telah diedit. Migrasi perlu memetakan editan teks terlebih dahulu; konten asli tetap tersimpan.' );
    }
    $original_query = $GLOBALS['wp_query'];
    $GLOBALS['wp_query'] = new WP_Query();
    $GLOBALS['wp_query']->is_page = true;
    $GLOBALS['wp_query']->queried_object = $page;
    $GLOBALS['wp_query']->queried_object_id = $page->ID;
    try {
        $content = bv_get_home_editor_content();
    } finally {
        $GLOBALS['wp_query'] = $original_query;
    }
    add_post_meta( $page->ID, '_bv_home_legacy_content_backup', wp_slash( $page->post_content ), true );
    wp_save_post_revision( $page->ID );
    return wp_update_post( wp_slash( array( 'ID' => $page->ID, 'post_content' => $content ) ), true );
}
