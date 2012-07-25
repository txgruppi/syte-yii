<?php

$basepath = __DIR__;
$root = realpath($basepath . '/../../..');
$protected = $root . '/protected';
$config = $protected . '/config/main.php';
$config = file_exists($config) ? (require $config) : null;
if (isset($config['components']) && isset($config['components']['syte']))
  $config = $config['components']['syte'];
$revision = $config['compressRevisionNumber'];

passthru("mkdir -p $basepath/static/css $basepath/static/js/min", $exit);
if ($exit !== 0)
  throw new Exception('Make sure to create "syte > static > css" and "syte > static > js > min" before compressing statics.');

passthru("lessc $basepath/static/less/styles.less $basepath/static/css/styles-$revision.min.css -yui-compress", $exit);
if ($exit === 0)
  echo "CSS Styles Generated: styles-$revision.min.css" . PHP_EOL;

$files = array(
  'libs/jquery.url.js',
  'libs/require.js',
  'libs/handlebars.js',
  'libs/moment.min.js',
  'libs/bootstrap-modal.js',
  'libs/spin.min.js',
  'libs/prettify.js',

  'components/base.js',
  'components/mobile.js',
  'components/blog-posts.js',
  'components/links.js',
);

if ($config['twitterIntegrationEnabled'])
  $files[] = 'components/twitter.js';

if ($config['githubIntegrationEnabled'])
  $files[] = 'components/github.js';

if ($config['dribbbleIntegrationEnabled'])
  $files[] = 'components/dribbble.js';

if ($config['instagramIntegrationEnabled'])
  $files[] = 'components/instagram.js';

if ($config['disqusIntegrationEnabled'])
  $files[] = 'components/disqus.js';

if ($config['lastfmIntegrationEnabled'])
  $files[] = 'components/lastfm.js';

foreach ($files as $k => $file) {
  $symbol = $k === 0 ? '>' : '>>';
  passthru("cat $basepath/static/js/$file $symbol $basepath/static/js/combined.js", $exit);
}

passthru("uglifyjs -o $basepath/static/js/min/scripts-$revision.min.js $basepath/static/js/combined.js", $exit);
passthru("rm -rf $basepath/static/js/combined.js $root/assets/*");
if ($exit === 0)
  echo "JavaScript Combined and Minified: scripts-$revision.min.js" . PHP_EOL;