<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true){
    die();
}
?>
<? if($arResult):?>
    <div class="content-wrapper">
        <? foreach($arResult as $item):?>
        <div class="content-item">
            <div class="preview-picture">
                <img src="" alt="">
            </div>
            <div class="content-text-block">
                <div class="content-title">
                    <?=$item['NAME']?>
                </div>
                <div class="content-preview-text">
                    <?=$item['PREVIEW_TEXT']?>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
<?endif;?>
<?
echo "SERVER<pre>".print_r($arResult, true)."</pre>";