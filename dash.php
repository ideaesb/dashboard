<?php
$thumbnails = $xml->$region->$phenomenon->children();
// dig one level deeper for thumbnails if timeframe set
if (isset($timeframe))
{
  $thumbnails = $thumbnails->$timeframe->children();     
}

$count = 0;
$links = NULL;
foreach($thumbnails as $thumbnail) 
{

  // capture links if any for processing separately...
  if (isset ($thumbnail->links))
  {
     $links = $thumbnail->links->children();
	 continue;
  }


  // close previous row and open another one
  if ($count > 0 && $count % 3 == 0) echo '</div><div class="div-table-row">';  

?>

<div class="div-table-col">
<?php echo $thumbnail->title ?><!-- img src="images/section5/question_mark.png" width="14" height="14" class="question_mark" title="<?php // echo $thumbnail->blurb ?>" / -->
<br />
<?php
  if (isset($thumbnail->thumblink))
  { 
    // Case 2:   thumbnail lauches on external website
?>

<a href="<?php echo $thumbnail->thumblink ?>" target="_blank">
  <img src="<?php echo $thumbnail->thumb ?>" title="<?php echo $thumbnail->blurb ?>" width="170" /></a>

<?php
  }
  else
  {
    // default just expand the image whether on server or outside 
?>

<a href="<?php echo $thumbnail->thumb ?>" class="highslide" onclick="return hs.expand(this)">
		<img src="<?php echo $thumbnail->thumb ?>" title="<?php echo $thumbnail->blurb ?>" width="170" /></a>
<?php
  }  // endif (isset($thumbnail->thumblink))
?>
<br />
<p class="caption">source: <a href="<?php echo $thumbnail->link ?>" target="_blank"><?php echo $thumbnail->source ?></a></p>
<br />
</div><!-- closes div-table-col  -->
<?php

$count++;
}  // end foreach (thumbnail)

echo '<!-- processed ' .  $count . ' thumbnails -->';

 if (isset ($links))
 {
  // start new row and unordered list
  echo '</div><div class="div-table-row"><ul style="text-align:left">';
  foreach($links as $link)
  {
?>
        <li><a href="<?php echo $link->href ?>" target="_blank"><?php echo $link->display ?></a></li>
<?php
   } // close foreach 
   echo '</ul>';
 }
?>        