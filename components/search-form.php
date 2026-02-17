<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="relative">
        <input type="search" name="s" placeholder="Search here..." value="<?php echo get_search_query(); ?>" class="w-full px-4 py-2 pr-10 bg-blue-900 border border-blue-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" aria-label="Pesquisar" />
        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 transition-colors" aria-label="Pesquisar">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </div>
</form>