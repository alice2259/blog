<p>This is the requested post:</p>

<p>Post ID: <?php echo $post->postID; ?></p>
<p>Post Name: <?php echo $post->title; ?></p>
<?php 
$file = 'views/images/' . $post->title . '.jpeg';
if(file_exists($file)){
    $img = "<img src='$file' width='150' />";
    echo $img;
}
else
{
echo "<img src='views/images/standard/_nopostimage.png' width='150' />";
}

?>
	
