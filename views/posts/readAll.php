<p>Here is a list of all products:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->title; ?> &nbsp; &nbsp;
    <a href='?controller=post&action=read&id=<?php echo $post->postID; ?>'>See post information</a> &nbsp; &nbsp;
    <a href='?controller=post&action=delete&id=<?php echo $post->postID; ?>'>Delete Post</a> &nbsp; &nbsp;
    <a href='?controller=post&action=update&id=<?php echo $post->postID; ?>'>Update Post</a> &nbsp;
  </p>
<?php } ?>