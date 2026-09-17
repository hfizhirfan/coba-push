Homepage content editor
=======================

Run `php tests/home-editor.php` from the theme directory. The test loads the
local WordPress installation and changes only in-memory post/query objects.
It checks content fields, URL escaping, empty values, migrated images, and
unchanged template markup. It never saves sample edits to the database.

The homepage stores seven `browsbyveron/home-section` dynamic blocks. Each
contains text/image values; frontend layout still comes from the existing PHP
template parts. The editor exposes fields rather than the legacy invalid HTML.
Section order and removal are locked. Rich text allows bold, italic, and line
breaks; theme wrappers/classes, links, and interactive controls stay in PHP.

Field IDs are hashes of template DOM paths. If a template's structural markup
changes, migrate its old field IDs before changing those paths. Ordinary content
edits do not change the IDs. Updating theme options supplies defaults only;
saved Gutenberg fields take precedence.

The one-time migration keeps the original stored page content in
`_bv_home_legacy_content_backup` post meta and requests a WordPress revision.
It checks for edited legacy text and stops instead of overwriting unknown edits.
Repeated syncs do not reset a migrated homepage. Legacy content is retained in
`inc/gutenberg-template.php` solely for this comparison.

Browser verification used the installed WordPress block packages in an isolated,
unauthenticated preview: seven valid blocks, no warnings or JavaScript errors,
typing/serialization/reparse, and the single-column editor at 390px. The admin
Media Library dialog was not exercised in an authenticated session.
