<article id="<?php echo $id; ?>">
  <hgroup>
    <h2><a href="<?php echo $base_url; ?>/post/<?php echo $id; ?>"><?php echo $title; ?>&nbsp;</a></h2>
    <h3><a href="#<?php echo $id; ?>"><?php echo $formated_date; ?></a></h3>
  </hgroup>
  <?php echo $body; ?>
  <footer>
    <?php if (isset($tags) && $tags) : ?>
    <h4>Tags</h4>
    <ul class="tags">
      <?php foreach ($tags as $tag) : ?>
      <li><a href="<?php echo $base_url; ?>/tags/<?php echo $tag; ?>"><?php echo $tag; ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <?php if (isset($disqus_enabled) && $disqus_enabled) : ?>
    <div id="disqus_thread" class="disqus-thread">
      <a href="<?php echo $base_url; ?>/post/<?php echo $id; ?>#disqus_thread" class="comments"></a>
    </div>
    <?php endif; ?>
  </footer>
</article>
