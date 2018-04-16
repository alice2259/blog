<p>Here is a list of all Search posts:</p>

<?php foreach($searchPosts as $post) { ?>
  <p>
    <?php echo $post->title; ?>
    <a href='?controller=post&action=showPost&id=<?php echo $post->postID; ?>'>See content</a>
  </p>
<?php } ?>
