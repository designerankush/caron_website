<?php
// bootstrap.php - safe config loader

$configFile = __DIR__ . '/config.php';
$sampleFile = __DIR__ . '/config-sample.php';

if (is_file($configFile)) {
  $config = require $configFile;
} elseif (is_file($sampleFile)) {
  $config = require $sampleFile;
} else {
  $config = [];
}

function ci_config($key, $default = null) {
  global $config;

  $parts = explode('.', $key);
  $value = $config;

  foreach ($parts as $p) {
    if (!is_array($value) || !array_key_exists($p, $value)) {
      return $default;
    }
    $value = $value[$p];
  }

  return $value;
}
