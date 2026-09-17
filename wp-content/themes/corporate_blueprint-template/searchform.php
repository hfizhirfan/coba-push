<?php
/**
 * Search Form Template
 *
 * @package MBSCCTV
 */
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">search</span>
    <input class="bg-slate-100 dark:bg-slate-800 border-none rounded-md pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary w-64"
           placeholder="Cari produk..."
           type="search"
           name="s"
           value="<?php echo esc_attr( get_search_query() ); ?>">
</form>
