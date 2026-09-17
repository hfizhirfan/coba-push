(function (wp) {
    'use strict';
    var el = wp.element.createElement;
    var RichText = wp.blockEditor.RichText;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var BlockControls = wp.blockEditor.BlockControls;
    var PanelBody = wp.components.PanelBody;
    var Button = wp.components.Button;
    var ToolbarGroup = wp.components.ToolbarGroup;
    var ToolbarButton = wp.components.ToolbarButton;

    function decode(value) {
        var textarea = document.createElement('textarea');
        textarea.innerHTML = value;
        return textarea.value;
    }

    function attributes(source) {
        var result = {};
        var names = {
            'class': 'className',
            'tabindex': 'tabIndex',
            'viewbox': 'viewBox',
            'stroke-width': 'strokeWidth',
            'stroke-linecap': 'strokeLinecap',
            'stroke-linejoin': 'strokeLinejoin',
            'fill-rule': 'fillRule',
            'clip-rule': 'clipRule'
        };
        Object.keys(source || {}).forEach(function (name) {
            if (name.slice(0, 2) !== 'on') result[names[name] || name] = source[name];
        });
        return result;
    }

    function openMediaLibrary(title, onSelectCallback) {
        if (!wp.media) return;
        var frame = wp.media({
            title: title || 'Pilih atau Unggah Gambar',
            button: { text: 'Gunakan Gambar Ini' },
            multiple: false,
            library: { type: 'image' }
        });
        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            if (attachment && attachment.url) {
                onSelectCallback(attachment.url);
            }
        });
        frame.open();
    }

    wp.blocks.registerBlockType('browsbyveron/home-section', {
        apiVersion: 3,
        title: 'Konten Homepage',
        icon: 'edit-page',
        category: 'design',
        attributes: {
            section: { type: 'string', default: 'hero' },
            values: { type: 'object', default: {} }
        },
        supports: { html: false, customClassName: false, inserter: false, reusable: false },
        edit: function (props) {
            var config = (window.bvHomeEditor || {})[props.attributes.section];
            var blockProps = wp.blockEditor.useBlockProps({ className: 'bv-visual-editor' });
            var imageState = wp.element.useState(null);
            var selectedImage = imageState[0];
            var setSelectedImage = imageState[1];
            var termsState = wp.element.useState({});
            var values = props.attributes.values || {};
            var valuesRef = wp.element.useRef(values);
            valuesRef.current = values;

            if (!config || !config.tree) {
                return el('div', blockProps, 'Memuat komponen editor visual...');
            }

            function update(key, value) {
                var next = Object.assign({}, valuesRef.current);
                next[key] = value;
                valuesRef.current = next;
                props.setAttributes({ values: next });
            }

            // Collect all image fields in this section for sidebar & toolbar controls
            var imageFields = [];
            if (config.fields) {
                Object.keys(config.fields).forEach(function (key) {
                    if (config.fields[key].type === 'image') {
                        imageFields.push({
                            key: key,
                            label: config.fields[key].label || 'Gambar',
                            group: config.fields[key].group || 'Umum',
                            value: Object.prototype.hasOwnProperty.call(values, key) ? values[key] : config.fields[key].value
                        });
                    }
                });
            }

            function render(node, path, termPath) {
                if (typeof node === 'string') return node;
                var field = node.field && config.fields[node.field];
                var attrs = attributes(node.attrs);
                attrs.key = path;
                var classes = attrs.className || '';

                if (field) {
                    var value = Object.prototype.hasOwnProperty.call(values, node.field) ? values[node.field] : field.value;
                    attrs['data-bv-field'] = node.field;

                    if (field.type === 'image') {
                        attrs.src = decode(value);
                        attrs.className = classes + ' bv-editable-image' + (selectedImage === node.field ? ' is-selected' : '');
                        attrs.tabIndex = 0;
                        attrs.role = 'button';
                        attrs.title = 'Klik untuk mengganti gambar (' + field.label + ')';
                        attrs['aria-label'] = 'Ganti gambar: ' + field.label;
                        
                        var handleImageClick = function (event) {
                            if (event) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            setSelectedImage(node.field);
                            openMediaLibrary('Ganti Gambar: ' + field.label, function (url) {
                                update(node.field, url);
                            });
                        };

                        attrs.onClick = handleImageClick;
                        attrs.onKeyDown = function (event) {
                            if (event.key === 'Enter' || event.key === ' ') {
                                handleImageClick(event);
                            }
                        };

                        // Render image with a floating badge button for unmistakable interactivity
                        return el('div', {
                            key: path,
                            className: 'bv-image-edit-wrapper',
                            style: { position: 'relative', display: 'block', width: '100%', height: '100%' },
                            onClick: handleImageClick
                        },
                            el('img', attrs),
                            el('button', {
                                type: 'button',
                                className: 'bv-image-edit-badge',
                                title: 'Ganti ' + field.label,
                                onClick: handleImageClick
                            }, '📷 Ganti')
                        );
                    }

                    if (node.tag === '#text') {
                        var leading = node.text.match(/^\s*/)[0];
                        var trailing = node.text.match(/\s*$/)[0];
                        return el(wp.element.Fragment, { key: path }, leading, el(RichText, {
                            tagName: 'span',
                            className: 'bv-inline-text',
                            'data-bv-field': node.field,
                            value: value,
                            allowedFormats: [],
                            disableLineBreaks: true,
                            'aria-label': field.label + ' — ' + config.title,
                            onChange: function (text) { update(node.field, text); }
                        }), trailing);
                    }

                    return el(RichText, Object.assign({}, attrs, {
                        tagName: node.tag,
                        value: value,
                        allowedFormats: ['core/bold', 'core/italic'],
                        'aria-label': field.label + ' — ' + config.title,
                        onChange: function (text) { update(node.field, text); }
                    }));
                }

                if ((' ' + classes + ' ').indexOf(' bv-term-item ') !== -1) {
                    termPath = path;
                    if (Object.prototype.hasOwnProperty.call(termsState[0], path)) {
                        attrs.className = classes.replace(/\bis-active\b/g, '') + (termsState[0][path] ? ' is-active' : '');
                    }
                }

                if (node.tag === 'a') {
                    attrs.onClick = function (event) { event.preventDefault(); };
                }

                if (node.tag === 'button' && (' ' + classes + ' ').indexOf(' bv-term-trigger ') !== -1) {
                    attrs['aria-expanded'] = Object.prototype.hasOwnProperty.call(termsState[0], termPath) ? String(termsState[0][termPath]) : attrs['aria-expanded'];
                    attrs.onClick = function (event) {
                        if (event.target.closest('[contenteditable="true"]')) return;
                        var next = Object.assign({}, termsState[0]);
                        next[termPath] = attrs['aria-expanded'] !== 'true';
                        termsState[1](next);
                    };
                }

                var children = (node.children || []).map(function (child, index) {
                    return render(child, path + '-' + index, termPath);
                });

                return ['br', 'hr', 'input', 'img'].indexOf(node.tag) !== -1 ? el(node.tag, attrs) : el(node.tag, attrs, children);
            }

            // Top Floating Toolbar: Display individual buttons for each image in this section
            var toolbar = imageFields.length > 0 ? el(BlockControls, {},
                el(ToolbarGroup, {},
                    imageFields.map(function (img, idx) {
                        var shortName = img.label.length > 18 ? img.label.substring(0, 18) + '...' : img.label;
                        return el(ToolbarButton, {
                            key: img.key,
                            icon: 'format-image',
                            label: 'Ganti ' + img.label,
                            isActive: selectedImage === img.key,
                            onClick: function () {
                                setSelectedImage(img.key);
                                openMediaLibrary('Ganti Foto: ' + img.label, function (url) {
                                    update(img.key, url);
                                });
                            }
                        }, '📷 ' + shortName);
                    })
                )
            ) : null;

            // Right Sidebar Inspector Panel for all images in this section
            var sidebar = el(InspectorControls, {},
                imageFields.length > 0 ? el(PanelBody, { title: '🖼️ Pengaturan Gambar (' + config.title + ')', initialOpen: true },
                    imageFields.map(function (img, idx) {
                        return el('div', {
                            key: img.key,
                            style: {
                                marginBottom: '16px',
                                padding: '12px',
                                background: '#f0ede6',
                                borderRadius: '8px',
                                border: selectedImage === img.key ? '2px solid #6b4e3d' : '1px solid #e0d6c8'
                            }
                        },
                            el('p', { style: { fontWeight: 'bold', margin: '0 0 8px 0', fontSize: '13px', color: '#1e1815' } }, (idx + 1) + '. ' + img.label),
                            img.value ? el('img', {
                                src: decode(img.value),
                                alt: img.label,
                                style: { width: '100%', height: '110px', objectFit: 'cover', borderRadius: '6px', marginBottom: '8px', display: 'block' }
                            }) : null,
                            el(Button, {
                                variant: 'primary',
                                isSmall: true,
                                style: { backgroundColor: '#6b4e3d', borderColor: '#6b4e3d', width: '100%', justifyContent: 'center' },
                                onClick: function () {
                                    setSelectedImage(img.key);
                                    openMediaLibrary('Ganti ' + img.label, function (url) {
                                        update(img.key, url);
                                    });
                                }
                            }, '📷 Ganti / Unggah Foto')
                        );
                    })
                ) : null
            );

            return el(wp.element.Fragment, {},
                toolbar,
                sidebar,
                el('div', blockProps,
                    el('div', { className: 'site-main' },
                        config.tree.map(function (node, index) { return render(node, String(index)); })
                    )
                )
            );
        },
        save: function () { return null; }
    });
})(window.wp);
