<?php

class DefaultController extends SyteController {

  public $mediaUrl;

	public function actionIndex() {
    $this->mediaUrl = Yii::app()->assetManager->publish(__DIR__ . '/../static', false, -1, YII_DEBUG);
    Yii::app()->clientScript->registerScriptFile($this->mediaUrl . '/js/components/views/index.js', CClientScript::POS_END);
		$this->render('index');
	}

  public function actionBlog() {
    echo $this->curlGet(Yii::app()->syte->tumblrApiUrl . '/posts?api_key=' . Yii::app()->syte->tumblrApiKey);
  }

  public function actionPost($id) {
    $this->mediaUrl = Yii::app()->assetManager->publish(__DIR__ . '/../static', false, -1, YII_DEBUG);
    Yii::app()->clientScript->registerScriptFile($this->mediaUrl . '/js/components/views/blog-post.js', CClientScript::POS_END);
    $json = $this->curlGet(Yii::app()->syte->tumblrApiUrl . '/posts?id=' . $id . '&api_key=' . Yii::app()->syte->tumblrApiKey);
    $json = json_decode($json, true);
    if (isset($json['response']) && isset($json['response']['posts'])) {
      $post = array_shift($json['response']['posts']);
      $time = strtotime($post['date']);
      $post['formated_date'] = Yii::app()->dateFormatter->format('MMMM dd, yyyy', $time);
      $post['disqus_enabled'] = Yii::app()->syte->disqusIntegrationEnabled;
      $post['base_url'] = preg_replace("/\/$/", '', Yii::app()->createUrl('/syte/default/index'));

      $partial = $this->renderPartial('blog-post-' . $post['type'], $post, true);
      $this->render('blog-post', array(
        'content' => $partial,
      ));
    }
  }

  public function actionTags($id) {
    $this->redirect(Yii::app()->syte->tumblrBlogUrl . '/tagged/' . $id);
  }

  public function actionTwitter($username) {
    if (!Yii::app()->syte->twitterIntegrationEnabled)
      return;

    $oauth = new OAuth(Yii::app()->syte->twitterConsumerKey, Yii::app()->syte->twitterConsumerSecret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
    $oauth->setToken(Yii::app()->syte->twitterUserKey, Yii::app()->syte->twitterUserSecret);
    if ($oauth->fetch(Yii::app()->syte->twitterApiUrl . $username))
      echo $oauth->getLastResponse();
  }

  public function actionGithub($username) {
    if (!Yii::app()->syte->githubIntegrationEnabled)
      return;

    $user = $this->curlGet(Yii::app()->syte->githubApiUrl . 'users/' . $username . '?access_token=' . Yii::app()->syte->githubAccessToken);
    $repo = $this->curlGet(Yii::app()->syte->githubApiUrl . 'users/' . $username . '/repos?access_token=' . Yii::app()->syte->githubAccessToken);
    
    echo "{\"user\":$user,\"repos\":$repo}";
  }

  public function actionDribbble($username) {
    if (!Yii::app()->syte->dribbbleIntegrationEnabled)
      return;

    echo $this->curlGet(Yii::app()->syte->dribbbleApiUrl . $username . '/shots');
  }

  public function actionInstagram() {
    if (!Yii::app()->syte->instagramIntegrationEnabled)
      return;

    $user = $this->curlGet(Yii::app()->syte->instagramApiUrl . 'users/' . Yii::app()->syte->instagramUserId . '/?access_token=' . Yii::app()->syte->instagramAccessToken);
    $media = $this->curlGet(Yii::app()->syte->instagramApiUrl . 'users/' . Yii::app()->syte->instagramUserId . '/media/recent/?access_token=' . Yii::app()->syte->instagramAccessToken);

    $user = json_decode($user, true);
    $media = json_decode($media, true);

    echo json_encode(array(
      'user' => $user['data'],
      'media' => $media['data'],
      'pagination' => $media['pagination'],
    ));
  }

  public function actionInstagramNext($max) {
    if (!Yii::app()->syte->instagramIntegrationEnabled)
      return;

    $media = $this->curlGet(Yii::app()->syte->instagramApiUrl . 'users/' . Yii::app()->syte->instagramUserId . '/media/recent/?max_id=' . $max . '&access_token=' . Yii::app()->syte->instagramAccessToken);

    $media = json_decode($media, true);

    echo json_encode(array(
      'media' => $media['data'],
      'pagination' => $media['pagination'],
    ));
  }

  public function actionLastfm($username) {
    if (!Yii::app()->syte->lastfmIntegrationEnabled)
      return;

    $tracks = $this->curlGet(Yii::app()->syte->lastfmApiUrl . '?format=json&method=user.getrecenttracks&user=' . Yii::app()->syte->lastfmUsername . '&api_key=' . Yii::app()->syte->lastfmApiKey);
    $user = $this->curlGet(Yii::app()->syte->lastfmApiUrl . '?format=json&method=user.getinfo&user=' . Yii::app()->syte->lastfmUsername . '&api_key=' . Yii::app()->syte->lastfmApiKey);

    echo "{\"user_info\":$user,\"recenttracks\":$tracks}";
  }
}