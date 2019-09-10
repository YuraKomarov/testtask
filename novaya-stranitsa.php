<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?>
<?
$APPLICATION->IncludeComponent(
    "komarov:ddemo.content",
    "",
    Array(
        "IBLOCK_ID" => 2,
        "COMMENTS_HIGHLOADBLOCK_ID" => 2,
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>