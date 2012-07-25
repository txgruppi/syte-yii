<?php

class InstallController extends SyteController {

  public function redirectToNext($current) {
    Yii::app()->session->open();
    $services = Yii::app()->session['services'];
    $index = array_search($current, $services);
    if ($index === false)
      $this->redirect(array('index'));
    $next = isset($services[$index+1]) ? $services[$index+1] : null;
    if ($next === null)
      $this->redirect(array('end'));
    else
      $this->redirect(array($next));
  }

  public function actionIndex() {
    $this->pageTitle = Yii::app()->name . ' - Syte - Install';

    if (Yii::app()->request->isPostRequest) {
      $services = array('tumblr');
      if (isset($_POST['disqus'])) $services[] = 'disqus';
      if (isset($_POST['twitter'])) $services[] = 'twitter';
      if (isset($_POST['github'])) $services[] = 'github';
      if (isset($_POST['dribbble'])) $services[] = 'dribbble';
      if (isset($_POST['instagram'])) $services[] = 'instagram';
      if (isset($_POST['lastfm'])) $services[] = 'lastfm';
      if (isset($_POST['analytics'])) $services[] = 'analytics';
      Yii::app()->session->open();
      Yii::app()->session['services'] = $services;

      $this->redirect(array('tumblr'));
    }

    $this->render('index');
  }

  public function actionTumblr() {
    $model = new TumblrInstallModel();

    if (isset($_POST['TumblrInstallModel'])) {
      $model->attributes = $_POST['TumblrInstallModel'];
      if ($model->validate()) {
        $serializedModel = serialize($model);
        Yii::app()->session->open();
        Yii::app()->session['tumblrModel'] = $serializedModel;

        $this->redirectToNext('tumblr');
      }
    }

    $this->render('tumblr', array(
      'model' => $model,
    ));
  }

  public function actionDisqus() {
    $model = new DisqusInstallModel();

    if (isset($_POST['DisqusInstallModel'])) {
      $model->attributes = $_POST['DisqusInstallModel'];
      if ($model->validate()) {
        $serializedModel = serialize($model);
        Yii::app()->session->open();
        Yii::app()->session['disqusModel'] = $serializedModel;
        $this->redirectToNext('disqus');
      }
    }

    $this->render('disqus', array(
      'model' => $model,
    ));
  }

  public function actionAnalytics() {
    $model = new AnalyticsInstallModel();

    if (isset($_POST['AnalyticsInstallModel'])) {
      $model->attributes = $_POST['AnalyticsInstallModel'];
      if ($model->validate()) {
        $serializedModel = serialize($model);
        Yii::app()->session->open();
        Yii::app()->session['analyticsModel'] = $serializedModel;
        $this->redirectToNext('analytics');
      }
    }

    $this->render('analytics', array(
      'model' => $model,
    ));
  }

  public function actionTwitter() {
    $model = new TwitterInstallModel();

    if (isset($_POST['TwitterInstallModel'])) {
      $model->attributes = $_POST['TwitterInstallModel'];
      if ($model->validate()) {
        $serializedModel = serialize($model);
        Yii::app()->session->open();
        Yii::app()->session['twitterModel'] = $serializedModel;
        $this->redirectToNext('twitter');
      }
    }

    $this->render('twitter', array(
      'model' => $model,
    ));
  }

  public function actionGithub() {
    Yii::app()->session->open();
    if (isset(Yii::app()->session['githubModel']))
      $model = unserialize(Yii::app()->session['githubModel']);
    else
      $model = new GithubInstallModel('step1');
    $redirect_uri = Yii::app()->createAbsoluteUrl('/syte/install/github');

    if (isset($_GET['code']) && !Yii::app()->request->isPostRequest) {
      $code = $_GET['code'];
      $ch = curl_init();
      curl_setopt_array($ch, array(
        CURLOPT_URL => Yii::app()->syte->githubOauthAccessTokenUrl,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
          'client_id' => $model->githubClientId,
          'client_secret' => $model->githubClientSecret,
          'redirect_uri' => $redirect_uri,
          'code' => $code,
        ),
        CURLOPT_HTTPHEADER => array(
          "Accept: application/json"
        ),
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
      ));
      $json = curl_exec($ch);
      $data = json_decode($json, true);
      $model->githubAccessToken = $data['access_token'];
      $model->scenario = 'step2';
    }

    if (isset($_POST['GithubInstallModel'])) {
      if (isset($_POST['GithubInstallModel']['githubAccessToken']) && isset($_POST['GithubInstallModel']['githubAccessToken']))
        $model->scenario = 'step2';

      $model->attributes = $_POST['GithubInstallModel'];
      if ($model->validate()) {
        $serializedModel = serialize($model);
        Yii::app()->session['githubModel'] = $serializedModel;
        if ($model->scenario === 'step1') {
          $this->redirect(Yii::app()->syte->githubOauthAuthorizeUrl . '?client_id=' . $model->githubClientId . '&response_type=code&redirect_uri=' . $redirect_uri);
        } else
          $this->redirectToNext('github');
      }
    }

    $this->render('github', array(
      'model' => $model,
    ));
  }

  public function actionDribbble() {
    $this->redirectToNext('dribbble');
  }

  public function actionInstagram() {
    Yii::app()->session->open();
    if (isset(Yii::app()->session['instagramModel']))
      $model = unserialize(Yii::app()->session['instagramModel']);
    else
      $model = new InstagramInstallModel('step1');
    $redirect_uri = Yii::app()->createAbsoluteUrl('/syte/install/instagram');

    if (isset($_GET['code']) && !Yii::app()->request->isPostRequest) {
      $code = $_GET['code'];
      $ch = curl_init();
      curl_setopt_array($ch, array(
        CURLOPT_URL => Yii::app()->syte->instagramOauthAccessTokenUrl,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
          'client_id' => $model->instagramClientId,
          'client_secret' => $model->instagramClientSecret,
          'grant_type' => 'authorization_code',
          'redirect_uri' => $redirect_uri,
          'code' => $code,
        ),
        CURLOPT_HTTPHEADER => array(
          "Accept: application/json"
        ),
        CURLOPT_HEADER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
      ));
      $json = curl_exec($ch);
      $data = json_decode($json, true);
      $model->instagramAccessToken = $data['access_token'];
      $model->instagramUserId = $data['user']['id'];
      $model->scenario = 'step2';
    }

    if (isset($_POST['InstagramInstallModel'])) {
      if (isset($_POST['InstagramInstallModel']['instagramAccessToken']) && !empty($_POST['InstagramInstallModel']['instagramAccessToken']))
        $model->scenario = 'step2';

      $model->attributes = $_POST['InstagramInstallModel'];
      if ($model->validate()) {
        $serializedModel = serialize($model);
        Yii::app()->session['instagramModel'] = $serializedModel;
        if ($model->scenario === 'step1') {
          $this->redirect(Yii::app()->syte->instagramOauthAuthorizeUrl . '?client_id=' . $model->instagramClientId . '&response_type=code&redirect_uri=' . $redirect_uri);
        } else
          $this->redirectToNext('instagram');
      }
    }

    $this->render('instagram', array(
      'model' => $model,
      'redirect_uri' => $redirect_uri,
    ));
  }

  public function actionLastfm() {
    $model = new LastFMInstallModel();

    if (isset($_POST['LastFMInstallModel'])) {
      $model->attributes = $_POST['LastFMInstallModel'];
      if ($model->validate()) {
        $serializedModel = serialize($model);
        Yii::app()->session->open();
        Yii::app()->session['lastfmModel'] = $serializedModel;
        $this->redirectToNext('lastfm');
      }
    }

    $this->render('lastfm', array(
      'model' => $model,
    ));
  }

  public function actionEnd() {
    Yii::app()->session->open();
    $services = Yii::app()->session['services'];

    $tumblrModel = isset(Yii::app()->session['tumblrModel']) ? unserialize(Yii::app()->session['tumblrModel']) : null;
    $twitterModel = isset(Yii::app()->session['twitterModel']) ? unserialize(Yii::app()->session['twitterModel']) : null;
    $githubModel = isset(Yii::app()->session['githubModel']) ? unserialize(Yii::app()->session['githubModel']) : null;
    $instagramModel = isset(Yii::app()->session['instagramModel']) ? unserialize(Yii::app()->session['instagramModel']) : null;
    $lastfmModel = isset(Yii::app()->session['lastfmModel']) ? unserialize(Yii::app()->session['lastfmModel']) : null;
    $disqusModel = isset(Yii::app()->session['disqusModel']) ? unserialize(Yii::app()->session['disqusModel']) : null;
    $analyticsModel = isset(Yii::app()->session['analyticsModel']) ? unserialize(Yii::app()->session['analyticsModel']) : null;

    $rssFeedEnabled = $tumblrModel->rssFeedEnabled;
    $twitterIntegrationEnabled = array_search('twitter', $services) !== false && $twitterModel;
    $githubIntegrationEnabled = array_search('github', $services) !== false && $githubModel;
    $dribbbleIntegrationEnabled = array_search('dribbble', $services);
    $instagramIntegrationEnabled = array_search('instagram', $services) && $instagramModel;
    $lastfmIntegrationEnabled = array_search('lastfm', $services) && $lastfmModel;
    $disqusIntegrationEnabled = array_search('disqus', $services) && $disqusModel;
    $analyticsIntegrationEnabled = array_search('analytics', $services) && $analyticsModel;
    
    $this->render('end', array(
      'services' => $services,
      'tumblrModel' => $tumblrModel,
      'twitterModel' => $twitterModel,
      'githubModel' => $githubModel,
      'instagramModel' => $instagramModel,
      'lastfmModel' => $lastfmModel,
      'disqusModel' => $disqusModel,
      'analyticsModel' => $analyticsModel,
      'rssFeedEnabled' => $rssFeedEnabled,
      'twitterIntegrationEnabled' => $twitterIntegrationEnabled,
      'githubIntegrationEnabled' => $githubIntegrationEnabled,
      'dribbbleIntegrationEnabled' => $dribbbleIntegrationEnabled,
      'instagramIntegrationEnabled' => $instagramIntegrationEnabled,
      'lastfmIntegrationEnabled' => $lastfmIntegrationEnabled,
      'disqusIntegrationEnabled' => $disqusIntegrationEnabled,
      'analyticsIntegrationEnabled' => $analyticsIntegrationEnabled,
    ));
  }
}