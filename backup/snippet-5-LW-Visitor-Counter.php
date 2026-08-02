<?php
// LW Visitor Counter (Code Snippets id 5, PHP, aktivni)
add_shortcode('lw_counter', function () { if (!isset($_COOKIE['lw_seen'])) { $n = (int) get_option('lw_visit_count', 998); $n++; update_option('lw_visit_count', $n); setcookie('lw_seen', '1', time() + 3600, '/'); } else { $n = (int) get_option('lw_visit_count', 998); } return '<span class="lw-counter">Návštěv / Visits: <b>' . $n . '</b></span>'; });
