<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){
    die();
}
?>
<?php if($arResult):?>
    <?php
    $item = $arResult[0];
    $APPLICATION->SetTitle($item['NAME']);
    $renderImage = CFile::ResizeImageGet(
            $item['PREVIEW_PICTURE'], Array("width" => 512, "height" => 512),
            BX_RESIZE_IMAGE_EXACT, false);
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
        <input type="submit" name="show-hide-comments" class="comments-button" value="Показать комментарии">
    </div>
    <div class="comments-wrapper">

    </div>

    <div class="form-wrapper">
        <div class="form-title">
            Оставить комментарий
        </div>
        <form action="" class="add-comment-form">
            <div>
                <input type="text" name="name" class="comments-name" placeholder="Ваше имя">
            </div>
            <div>
                <textarea rows="5" name="comment" class="comments-text" placeholder="Текст комментария"></textarea>
            </div>
            <div>
                <input type="submit" name="form-submit" class="comments-form-button" value="Оставить комментарий">
            </div>
        </form>
    </div>
<?php endif;?>
<script type="text/javascript">
    var params = <?=\Bitrix\Main\Web\Json::encode(['signedParameters'=>$this->getComponent()->getSignedParameters()])?>;
</script>
