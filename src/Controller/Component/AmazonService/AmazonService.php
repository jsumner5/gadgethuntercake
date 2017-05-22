 <?php
 class AmazonService{
     function AmazonService($associate_tag,$aws_access_key_id,$aws_secret_key)
     {
         if (!class_exists('ResponseParser')) {
             include_once 'ResponseParser.php';
         }
         $this->resonse_parser = new ResponseParser;

         $this->associate_tag = $associate_tag;
         $this->aws_access_key_id = $aws_access_key_id;
         $this->aws_secret_key = $aws_secret_key;

         // The region you are interested in
         $this->endpoint = "webservices.amazon.com";
         $this->uri = "/onca/xml";
     }

     function getXmlObjectById($asin){
         $params = array(
             "Service" => "AWSECommerceService",
             "Operation" => "ItemLookup",
             "AWSAccessKeyId" => $this->aws_access_key_id,
             "AssociateTag" => $this->associate_tag,
             "ItemId" => $asin,
             "IdType" => "ASIN",
             "ResponseGroup" => "Images,ItemAttributes,Offers"
         );
         // Set current timestamp if not set
         if (!isset($params["Timestamp"])) {
             $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
         }

         // Sort the parameters by key
         ksort($params);

         $pairs = array();

         foreach ($params as $key => $value) {
             array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
         }

         // Generate the canonical query
         $canonical_query_string = join("&", $pairs);

         // Generate the string to be signed
         $string_to_sign = "GET\n".$this->endpoint."\n".$this->uri."\n".$canonical_query_string;

         // Generate the signature required by the Product Advertising API
         $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $this->aws_secret_key, true));

         // Generate the signed URL
         $request_url = 'http://'.$this->endpoint.$this->uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);

         //create XML object if this happens I should handle the error
         $xml=simplexml_load_file($request_url) or die("Error: Cannot create XML object ::: ASIN = ".$asin);

         return $xml;
     }

     function getTitle($xmlObj){
         return $this->resonse_parser->getTitle($xmlObj);
     }
     function getPrice($xmlObj){
         return $this->resonse_parser->getPrice($xmlObj);

     }
     function getImgUrl($xmlObj){
        return $this->resonse_parser->getImgUrlMedium($xmlObj);
     }
     function getSignedUrl($xmlObj){
        return $this->resonse_parser->getDetailsLink($xmlObj);
     }
     function getAsin($xmlObj){
         return $this->resonse_parser->getId($xmlObj);
     }
     function getSmallImgUrl($xmlObj){
         return $this->resonse_parser->getImgUrlSmall($xmlObj);

     }
     function getLargeImgUrl($xmlObj){
         return $this->resonse_parser->getImgUrlLarge($xmlObj);
     }
     function getNormalPrice($xmlObj){
         return $this->resonse_parser->getNormalPrice($xmlObj);
     }

 }
?>