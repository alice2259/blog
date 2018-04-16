<!--post header image-->
<div class="header container-fluid" style="width:100%";>
     <br>
    <?php 
    $file = 'Views/images/' . $post->headerImage;
    if(file_exists($file)){
    $img = "<img src='$file'/>";
    echo $img;
    }
    else
    {
    echo "<img src='Views/images/default/noImage.jpg' width='150' />";
    }
    ?>

</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2><?php echo strtoupper($post->title); ?></h2>
      <h5>published: <?php echo $post->datePublished; ?></h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p><?php echo $post->content; ?></p>
    </div>
    
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

   