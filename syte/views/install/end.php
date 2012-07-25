<div class="container">
  <h1>Syte - Install</h1>
  <h2>Configuration</h2>
  <div class="row">
    <div class="span12">
      <pre>
'syte' => array(
  'class'                         => 'syte.components.SyteApplicationComponents',
  'installed'                     => true,
  'tumblrBlogUrl'                 => '<?php echo $tumblrModel->tumblrBlogUrl; ?>',
  'tumblrApiUrl'                  => 'http://api.tumblr.com/v2/blog/<?php echo str_replace('http://', '', $tumblrModel->tumblrBlogUrl); ?>',
  'tumblrApiKey'                  => '<?php echo $tumblrModel->tumblrApiKey; ?>',
  'rssFeedEnabled'                => <?php echo $rssFeedEnabled ? 'true' : 'false'; ?>,
  'rssFeedUrl'                    => '<?php echo $rssFeedEnabled ? ($tumblrModel->tumblrBlogUrl . '/rss') : ''; ?>',
  'twitterIntegrationEnabled'     => <?php echo $twitterIntegrationEnabled ? 'true' : 'false'; ?>,
  'twitterConsumerKey'            => '<?php echo $twitterIntegrationEnabled ? ($twitterModel->twitterConsumerKey) : ''; ?>',
  'twitterConsumerSecret'         => '<?php echo $twitterIntegrationEnabled ? ($twitterModel->twitterConsumerSecret) : ''; ?>',
  'twitterUserKey'                => '<?php echo $twitterIntegrationEnabled ? ($twitterModel->twitterUserKey) : ''; ?>',
  'twitterUserSecret'             => '<?php echo $twitterIntegrationEnabled ? ($twitterModel->twitterUserSecret) : ''; ?>',
  'githubIntegrationEnabled'      => <?php echo $githubIntegrationEnabled ? 'true' : 'false'; ?>,
  'githubAccessToken'             => '<?php echo $githubIntegrationEnabled ? ($githubModel->githubAccessToken) : ''; ?>',
  'githubClientId'                => '<?php echo $githubIntegrationEnabled ? ($githubModel->githubClientId) : ''; ?>',
  'githubClientSecret'            => '<?php echo $githubIntegrationEnabled ? ($githubModel->githubClientSecret) : ''; ?>',
  'dribbbleIntegrationEnabled'    => <?php echo $dribbbleIntegrationEnabled ? 'true' : 'false'; ?>,
  'instagramIntegrationEnabled'   => <?php echo $instagramIntegrationEnabled ? 'true' : 'false'; ?>,
  'instagramAccessToken'          => '<?php echo $instagramIntegrationEnabled ? ($instagramModel->instagramAccessToken) : ''; ?>',
  'instagramUserId'               => '<?php echo $instagramIntegrationEnabled ? ($instagramModel->instagramUserId) : ''; ?>',
  'instagramClientId'             => '<?php echo $instagramIntegrationEnabled ? ($instagramModel->instagramClientId) : ''; ?>',
  'instagramClientSecret'         => '<?php echo $instagramIntegrationEnabled ? ($instagramModel->instagramClientSecret) : ''; ?>',
  'lastfmIntegrationEnabled'      => <?php echo $lastfmIntegrationEnabled ? 'true' : 'false'; ?>,
  'lastfmApiKey'                  => '<?php echo $lastfmIntegrationEnabled ? ($lastfmModel->lastfmApiKey) : ''; ?>',
  'lastfmUsername'                => '<?php echo $lastfmIntegrationEnabled ? ($lastfmModel->lastfmUsername) : ''; ?>',
  'googleAnalyticsTrackingId'     => '<?php echo $analyticsIntegrationEnabled ? $analyticsModel->analyticsTrackingId : ''; ?>',
  'disqusIntegrationEnabled'      => <?php echo $disqusIntegrationEnabled ? 'true' : 'false'; ?>,
  'disqusShortname'               => '<?php echo $disqusIntegrationEnabled ? $disqusModel->disqusShortname : ''; ?>',
),
      </pre>
    </div>
  </div>
</div>