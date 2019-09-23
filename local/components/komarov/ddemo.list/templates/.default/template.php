<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true){
    die();
}
?>
<?php if($arResult):?>
    <div class='content-wrapper'>
        <?php foreach($arResult as $item):?>
            <?php
            $renderImage = CFile::ResizeImageGet(
                    $item['PREVIEW_PICTURE'], Array('width' => 128, 'height' => 128),
                    BX_RESIZE_IMAGE_EXACT, false);
            ?>
            <div class='content-item'>
                <div class='preview-picture'>
                    <img src='<?=$renderImage['src']?>' alt=''>
                </div>
                <div class='content-text-block'>
                    <div class='content-title'>
                        <a href='<?=$item['DETAIL_PAGE_URL']?>' class='content-link'>
                            <?=$item['NAME']?>
                        </a>
                    </div>
                    <div class='content-preview-text'>
                        <?=$item['PREVIEW_TEXT']?>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
<?endif;?>
<?
//echo 'SERVER<pre>'.print_r($arResult, true).'</pre>';