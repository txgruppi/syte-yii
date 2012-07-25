$(function() {
  fetchBlogPosts(window.tag_slug || null);
  if (disqus_integration_enabled) {
    $("body").bind("blog-post-loaded", function() {
      embedDisqus(true);
    });
  }
});