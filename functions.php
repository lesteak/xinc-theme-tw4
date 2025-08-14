<?php
$core_includes = [
  "inc/lib/init.php",
  "inc/lib/assets.php",
  "inc/lib/helpers.php",
  "inc/lib/clean.php",
  "inc/lib/shortcodes.php",
  "inc/lib/class-daisyui-walker.php",
];

$xinc_includes = [
  // "inc/custom/register-types.php"
];

$core_includes = array_merge($core_includes, $xinc_includes);

foreach ($core_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'xinc-theme'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);
