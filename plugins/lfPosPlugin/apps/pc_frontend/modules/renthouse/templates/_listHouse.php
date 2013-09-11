<ul>
     <?php foreach($listPos as $pos) : ?>
    <li class="location-item" id="location-item-<?php echo $pos->getId(); ?>">
        <?php if($pos->getFileId()) { ?>
            <img class='img_40x40' src="../../web/cache/img/jpg/w40_h40/'". <?php echo $pos->getFileId() . "'_crop.jpg'"; ?> />
        <?php } else { ?>
            <img class='img_40x40' src="../../web/images/no-image-yet.png" />
        <? } ?>

        <div class="right-block">
            <div class="location-title">
                <a href="../pos/<?php echo $pos->getFileId();?>" target='_blank'><?php echo $pos->getTitle();?></a>
            </div>

            <div class="location-address">
                <?php  $pos->getAddress();?>
            </div>
            <div class="location-note">

            </div>
            <div class="location-note">

            </div>
        </div>

        <div class="clear"></div>
    </li>
    <?php endforeach; ?>
</ul>
