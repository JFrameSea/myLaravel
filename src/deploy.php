<?php
echo "Start deploying...\n\n";
$app_root = dirname(__FILE__) . '/';

$appNames = ['web', 'admin'];

system('chmod -R 755 ' . $app_root);

foreach ($appNames as $appName) {
    system('chmod -R 777 ' . $app_root . 'bootstrap/' . $appName . '/cache');
    system('chmod -R 777 ' . $app_root . 'storage/' . $appName . '/app');
    system('chmod -R 777 ' . $app_root . 'storage/' . $appName . '/framework');
    system('chmod -R 777 ' . $app_root . 'storage/' . $appName . '/logs');
}

// system("php {$app_root}artisan.admin cache:clear");
// system("php {$app_root}artisan.web cache:clear");

//system("php {$app_root}artisan.admin acl:make");

echo "Done!\n\n";
