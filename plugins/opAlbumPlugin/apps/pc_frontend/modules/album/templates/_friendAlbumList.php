<?php use_helper('opAlbum') ?>

<?php if (count($albumList)): ?>
<div id="homeRecentList_<?php echo $gadget->getId() ?>" class="dparts homeRecentList"><div class="parts">
<div class="heading_top"><h3><?php echo __('Recently Posted Albums of %my_friend%', array('%my_friend%' => $op_term['my_friend']->pluralize()->titleize())) ?></h3></div>
<div class="block">

<ul class="articleList">
<?php foreach ($albumList as $album): ?>
<li><span class="date"><?php echo op_format_date($album->getCreatedAt(), 'XShortDateJa') ?></span><?php echo link_to($album->title, 'album_show', $album) ?> (<?php echo $album->getMember()->getName() ?>)</li>
<?php endforeach; ?>
</ul>

<div class="moreInfo">
<ul class="moreInfo">
<li><?php echo link_to(__('More'), 'album_list_friend') ?></li>
</ul>
</div>

</div>
</div></div>
<?php endif; ?>
