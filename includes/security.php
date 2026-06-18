<?php
// Headers de segurança — incluir no topo de todas as páginas
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Permissions-Policy: camera=(), microphone=(), geolocation=()");
header("Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src https://fonts.gstatic.com; img-src 'self' data:; script-src 'self'; frame-ancestors 'none';");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");

// Bloquear acesso direto a includes
if (basename($_SERVER['PHP_SELF']) === 'security.php') {
    http_response_code(403);
    exit('Acesso negado.');
}
