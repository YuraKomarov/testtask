<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){
    die();
}
?>
<? if($arResult):?>
    <?
    $item = $arResult[0];
    $APPLICATION->SetTitle($item['NAME']);
    $renderImage = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], Array("width" => 512, "height" => 512), BX_RESIZE_IMAGE_EXACT, false);
    ?>
    <div class="detail-content-wrapper">
        <div class="detail-content-item">
            <div class="detail-picture">
                <img src="<?=$renderImage['src']?>" alt="">
            </div>
            <div class="detail-text-block">
                <div class="detail-preview-text">
                    <?=$item['DETAIL_TEXT']?>
                </div>
            </div>
        </div>
    </div>
    <div class="show-hide-comments">
        <input type="submit" name="show-hide-comments" value="Показать комментарии">
    </div>
    <div class="comments-wrapper">

    </div>
<?endif;?>
<?
echo "SERVER<pre>".print_r($arResult, true)."</pre>";