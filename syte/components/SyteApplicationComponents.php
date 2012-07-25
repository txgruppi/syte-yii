<?php

class SyteApplicationComponents extends CApplicationComponent {
  public $installed;
  public $compressRevisionNumber;
  public $tumblrBlogUrl;
  public $tumblrApiUrl;
  public $tumblrApiKey;
  public $rssFeedEnabled;
  public $rssFeedUrl;
  public $twitterIntegrationEnabled;
  public $twitterApiUrl = 'http://api.twitter.com/1/statuses/user_timeline.json?include_rts=false&exclude_replies=true&count=50&screen_name=';
  public $twitterConsumerKey;
  public $twitterConsumerSecret;
  public $twitterUserKey;
  public $twitterUserSecret;
  public $githubIntegrationEnabled;
  public $githubApiUrl = 'https://api.github.com/';
  public $githubAccessToken;
  public $githubOauthEnabled;
  public $githubClientId;
  public $githubClientSecret;
  public $githubOauthAuthorizeUrl = 'https://github.com/login/oauth/authorize';
  public $githubOauthAccessTokenUrl = 'https://github.com/login/oauth/access_token';
  public $dribbbleIntegrationEnabled;
  public $dribbbleApiUrl = 'http://api.dribbble.com/players/';
  public $instagramIntegrationEnabled;
  public $instagramApiUrl = 'https://api.instagram.com/v1/';
  public $instagramAccessToken;
  public $instagramUserId;
  public $instagramOauthEnabled;
  public $instagramClientId;
  public $instagramClientSecret;
  public $instagramOauthAuthorizeUrl = 'https://api.instagram.com/oauth/authorize';
  public $instagramOauthAccessTokenUrl = 'https://api.instagram.com/oauth/access_token';
  public $googleAnalyticsTrackingId;
  public $disqusIntegrationEnabled;
  public $disqusShortname;
  public $lastfmIntegrationEnabled;
  public $lastfmApiUrl = 'http://ws.audioscrobbler.com/2.0/';
  public $lastfmApiKey;
  public $lastfmUsername;
}