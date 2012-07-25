$(function() {
  setupLinks();
  adjustBlogHeaders();
  if (disqus_integration_enabled) {
    embedDisqus();
  }
});