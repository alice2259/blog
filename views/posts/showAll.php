p>Here is a list of all posts:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->title; ?>
    <a href='?controller=post&action=showPost&id=<?php echo $post->postID; ?>'>See content</a>
  </p>
<?php } ?>