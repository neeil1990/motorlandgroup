<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$user_name = trim(strip_tags($_POST["user_name"]));
$user_email = trim(strip_tags($_POST["user_email"]));
$user_phone = trim(strip_tags($_POST["user_phone"]));
$modelName = trim(strip_tags($_POST["modelName"]));

$arEventFields = array(
    "NAME" => $user_name,
    "EMAIL" => $user_email,
    "PHONE" => $user_phone,
    "MODEL" => $modelName
);
CEvent::Send("ADD_TEST", SITE_ID, $arEventFields);

CModule::IncludeModule("iblock");
$el = new CIBlockElement;
$PROP = array();
$PROP["EMAIL"] = $user_email;
$PROP["PHONE"] = $user_phone;
$PROP["MODEL"] = $modelName;
$arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(),
    "IBLOCK_ID"      => 10,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => $user_name,
    "ACTIVE"         => "N"
);
$el->Add($arLoadProductArray);
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/include/popup-offer.php"
    )
);?>

