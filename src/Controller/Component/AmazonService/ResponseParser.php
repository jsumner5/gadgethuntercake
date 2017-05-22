<?php
class ResponseParser{

    function getId($xml_object){
        $asin = $xml_object->Items[0]->Item->ASIN;
        return $asin;
    }

    function getImgUrlSmall($xml_object){
        $url = $xml_object->Items[0]->Item->SmallImage->URL;
        return $url;
    }

    function getImgUrlMedium($xml_object){
        $url = $xml_object->Items[0]->Item->MediumImage->URL;
        return $url;
    }

    function getImgUrlLarge($xml_object){
        $url = $xml_object->Items[0]->Item->LargeImage->URL;
        return $url;
    }

    function getDetailsLink($xml_object){
        $url = $xml_object->Items[0]->Item->DetailPageURL;
        return $url;

    }

    function getSingedLink($xml_object){
        $url = $xml_object->Items[0]->Item->ItemLinks[0]->URL;
        return $url;
    }

    function getPrice($xml_object){
        $price = $xml_object->Items[0]->Item->Offers->Offer->OfferListing->SalePrice->FormattedPrice;

        if($price == ''){
            $price = $xml_object->Items[0]->Item->Offers->Offer->OfferListing->Price->FormattedPrice;
        }

        if($price == ''){
            $price = $xml_object->Items[0]->Item->ItemAttributes->ListPrice->FormattedPrice;
        }

        if($price == ''){
            $price = $xml_object->Items[0]->Item->OfferSummary->LowestNewPrice->FormattedPrice;
        }
        if($price == ''){
            $price ='';
        }
        return $price;
    }
    function getNormalPrice($xml_object){
        $price = $xml_object->Items[0]->Item->ItemAttributes->ListPrice->FormattedPrice;
        return $price;
    }

    function getTitle($xml_object){
        $title = $xml_object->Items[0]->Item->ItemAttributes->Title;
        $split_title = explode('(',$title);
        return $split_title[0];
    }

    function getAllImages($xml_Object){
        $images=[];

    }


}
?>