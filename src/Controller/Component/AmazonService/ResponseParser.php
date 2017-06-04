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
        if($xml_object->Items[0]->Item->Offers->Offer->OfferListing->SalePrice->Amount){
            $price = $xml_object->Items[0]->Item->Offers->Offer->OfferListing->SalePrice->Amount;
        }

        if($price == ''){
            $price = $xml_object->Items[0]->Item->Offers->Offer->OfferListing->Price->Amount;
        }

        if($price == ''){
            $price = $xml_object->Items[0]->Item->ItemAttributes->ListPrice->Amount;
        }

        if($price == ''){
            $price = $xml_object->Items[0]->Item->OfferSummary->LowestNewPrice->Amount;
        }
        if($price == ''){
            $price ='';
        }
        #format price as a decimal
        $price = number_format(($price/100),2);
        return $price;
    }
    function getNormalPrice($xml_object){
        $price = $xml_object->Items[0]->Item->ItemAttributes->ListPrice->Amount;
        # format price as a decimal
        $price = number_format(($price/100),2);
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