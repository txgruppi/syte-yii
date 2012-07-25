<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Site pessoal do programador web Tarcísio Gruppi [TXGruppi]" />
  <meta name="keywords" content="Tarcísio Gruppi, txgruppi, developer, programador" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo $this->mediaUrl; ?>/imgs/favicon.ico" type="image/x-icon" />
  <title><?php echo Yii::app()->name; ?></title>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <?php if (Yii::app()->syte->rssFeedEnabled) : ?>
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo Yii::app()->syte->rssFeedUrl; ?>" />
  <?php endif; ?>
  <?php if (YII_DEBUG) : ?>
  <link rel="stylesheet/less" type="text/css" href="<?php echo $this->mediaUrl; ?>/less/styles.less">
  <script src="<?php echo $this->mediaUrl; ?>/less/less-1.1.5.min.js" type="text/javascript"></script>
  <?php else : ?>
  <link rel="stylesheet" href="<?php echo $this->mediaUrl; ?>/css/styles-<?php echo Yii::app()->syte->compressRevisionNumber; ?>.min.css" type="text/css" media="screen, projection">
  <?php endif; ?>
</head>
<body>
<header class="main-header">
  <hgroup>
    <div class="picture">
      <a href="/" rel="home"></a>
    </div>
    <h1>Tarcísio Gruppi</h1>
    <h2>Web Developer</h2>
  </hgroup>
  <nav>
    <ul class="main-nav">
      <li><a href="<?php echo Yii::app()->createUrl('/syte/default/index'); ?>" id="home-link">Home</a></li>
      <li><a href="http://twitter.com/#!/txgruppi" id="twitter-link">Twitter</a></li>
      <li><a href="http://github.com/txgruppi" id="github-link">Github</a></li>
      <li><a href="http://dribbble.com/txgruppi" id="dribbble-link">Dribbble</a></li>
      <li><a href="http://instagr.am/p/NfecnCjySO" id="instagram-link">Instagram</a></li>
      <li><a href="http://lastfm.com/user/txgruppi" id="lastfm-link">Last.fm</a></li>
      <li><a href="mailto:tarcisio@txgruppi.com" id="contact-link">Contact</a></li>
    </ul>
  </nav>
</header>
<?php echo $content; ?>
<div class="mobile-nav">
  <span class="nav-btn" id="mobile-nav-btn">
    <span class="nav-btn-bar"></span>
    <span class="nav-btn-bar"></span>
    <span class="nav-btn-bar"></span>
  </span>
  <h3><a href="/">txgruppi.com</a></h3>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
window.base_url = '<?php echo preg_replace("/\/$/", '', Yii::app()->createUrl('/syte/default/index')); ?>';
window.media_url = '<?php echo $this->mediaUrl; ?>';
window.twitter_integration_enabled =   <?php echo Yii::app()->syte->twitterIntegrationEnabled ? 'true' : 'false'; ?>;
window.github_integration_enabled =    <?php echo Yii::app()->syte->githubIntegrationEnabled ? 'true' : 'false'; ?>;
window.dribbble_integration_enabled =  <?php echo Yii::app()->syte->dribbbleIntegrationEnabled ? 'true' : 'false'; ?>;
window.instagram_integration_enabled = <?php echo Yii::app()->syte->instagramIntegrationEnabled ? 'true' : 'false'; ?>;
window.lastfm_integration_enabled =    <?php echo Yii::app()->syte->lastfmIntegrationEnabled ? 'true' : 'false'; ?>;
window.disqus_integration_enabled =    <?php echo Yii::app()->syte->disqusIntegrationEnabled ? 'true' : 'false'; ?>;

<?php if (Yii::app()->syte->disqusIntegrationEnabled) : ?>window.disqus_shortname = '<?php echo Yii::app()->syte->disqusShortname; ?>';<?php endif; ?>
</script>

<?php if (YII_DEBUG) : ?>
<script src="<?php echo $this->mediaUrl; ?>/js/libs/jquery.url.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/libs/require.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/libs/handlebars.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/libs/moment.min.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/libs/bootstrap-modal.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/libs/spin.min.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/libs/prettify.js"></script>

<script src="<?php echo $this->mediaUrl; ?>/js/components/base.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/components/mobile.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/components/blog-posts.js"></script>
<script src="<?php echo $this->mediaUrl; ?>/js/components/links.js"></script>

<?php if (Yii::app()->syte->twitterIntegrationEnabled) : ?><script src="<?php echo $this->mediaUrl; ?>/js/components/twitter.js"></script><?php endif; ?>
<?php if (Yii::app()->syte->githubIntegrationEnabled) : ?><script src="<?php echo $this->mediaUrl; ?>/js/components/github.js"></script><?php endif; ?>
<?php if (Yii::app()->syte->dribbbleIntegrationEnabled) : ?><script src="<?php echo $this->mediaUrl; ?>/js/components/dribbble.js"></script><?php endif; ?>
<?php if (Yii::app()->syte->instagramIntegrationEnabled) : ?><script src="<?php echo $this->mediaUrl; ?>/js/components/instagram.js"></script><?php endif; ?>
<?php if (Yii::app()->syte->lastfmIntegrationEnabled) : ?><script src="<?php echo $this->mediaUrl; ?>/js/components/lastfm.js"></script><?php endif; ?>
<?php if (Yii::app()->syte->disqusIntegrationEnabled) : ?><script src="<?php echo $this->mediaUrl; ?>/js/components/disqus.js"></script><?php endif; ?>

<?php else : ?>
<script src="<?php echo $this->mediaUrl; ?>/js/min/scripts-<?php echo Yii::app()->syte->compressRevisionNumber; ?>.min.js"></script>
<?php endif; ?>

<script type="text/javascript">
<?php if (Yii::app()->syte->googleAnalyticsTrackingId) : ?>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php echo Yii::app()->syte->googleAnalyticsTrackingId; ?>']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
<?php endif; ?>
</script>
</body>



