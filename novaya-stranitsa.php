<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?>Text here....
<? die("123");
if (CModule::IncludeModule("komarov.ddemo")){
    Komarov\Ddemo\Test::get();
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>