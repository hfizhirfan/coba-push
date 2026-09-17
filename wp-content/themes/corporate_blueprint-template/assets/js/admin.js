(function ($) {
    'use strict';

    $(document).on('click', '.mbscctv-media-select', function () {
        var control = $(this).closest('.mbscctv-media-control');
        var frame = wp.media({
            title: 'Pilih Gambar Hero',
            button: { text: 'Gunakan gambar ini' },
            library: { type: 'image' },
            multiple: false
        });

        frame.on('select', function () {
            var attachment = frame.state().get('selection').first().toJSON();
            var previewUrl = attachment.sizes && attachment.sizes.large
                ? attachment.sizes.large.url
                : attachment.url;

            control.find('.mbscctv-media-id').val(attachment.id);
            control.find('.mbscctv-media-preview')
                .removeClass('is-empty')
                .html($('<img>', { src: previewUrl, alt: '' }));
            control.find('.mbscctv-media-remove').prop('hidden', false);
        });

        frame.open();
    });

    $(document).on('click', '.mbscctv-media-remove', function () {
        var control = $(this).closest('.mbscctv-media-control');

        control.find('.mbscctv-media-id').val('');
        control.find('.mbscctv-media-preview')
            .addClass('is-empty')
            .html('<span>Belum ada gambar yang dipilih</span>');
        $(this).prop('hidden', true);
    });
}(jQuery));
