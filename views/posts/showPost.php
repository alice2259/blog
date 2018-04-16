<p>This is the requested post:</p>

<p><b>POST TITLE:</b> <br>
    <?php echo $post->title; ?></p>
<p><b>POST CONTENT:</b> <br>
    <?php echo $post->content; ?></p>
<p><b>POST HEADER IMAGE:</b> <br>
    <?php 
    $file = 'views/' . $post->headerImage;
    if(file_exists($file)){
    $img = "<img src='$file' width='150' />";
    echo $img;
    }
    else
    {
    echo "<img src='views/images/default/noImage.jpg' width='150' />";
    }

?></html>
