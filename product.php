$idsProductDel = [];
$idNotOriginal = [];
$arSelect = ["ID", "NAME", "IBLOCK_ID", 'DATE_CREATE', 'PROPERTY_UNIX_METKA', 'XML_ID'];
$arFilter = ["IBLOCK_ID" => 2, 'PROPERTY_SOLD_VALUE' => 'Y', 
// '<ID' => 3303219,
'<DATE_CREATE' => '01.12.2019 00:00:00', 
'<PROPERTY_UNIX_METKA' => time() - 60*60*24*$days];
$resEl = CIBlockElement::GetList(['ID'=> 'ASC'], $arFilter, false, ['nTopCount' => 100], $arSelect);
while($ob = $resEl->GetNextElement())
{
    $arFields = $ob->GetFields();
    if($arFields['XML_ID']){
    	$idsProductDel[$arFields['XML_ID']] = $arFields['ID']; 
    }else{
    	$idNotOriginal[] = $arFields['ID'];
    }
    
    // print_r($arFields);
    $dateCreate = $arFields['DATE_CREATE'];
}
