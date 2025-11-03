<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

// 🔑 Recrée les clés JWT à partir des variables d'environnement si elles existent
$jwtDir = dirname(__DIR__) . '/config/jwt';

if (!is_dir($jwtDir)) {
    mkdir($jwtDir, 0700, true);
}

if ($private = getenv('JWT_PRIVATE_KEY_BASE64')) {
    file_put_contents($jwtDir . '/private.pem', base64_decode($private));
}

if ($public = getenv('JWT_PUBLIC_KEY_BASE64')) {
    file_put_contents($jwtDir . '/public.pem', base64_decode($public));
}

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
