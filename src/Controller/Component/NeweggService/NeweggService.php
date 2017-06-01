 <?php
 class NeweggService
 {
     function NeweggService()
     {
         $this->options = [
             'authorization' => '00d4e01ca1448792fa02c5b573d3dbdfac964bb2f73e0aab26c83885eea4134463b7b7cc2670e0fe3a9b9d90ce6a931d28f7d42495c8ea764cbcf664bf8e08983d/714e548ed60e1f82296598be6d1ed44065c32720088adf2c8657e799ed054059a6d5f18421d53d5e1ba57592c1e57bbfe1a2332a27baddd0198235d46dff7f81',
             'website-id' => '8307307',
             'advertiser-ids' => 'joined',
             'keywords' => 'nvidia+gtx+1080',
             'limit' => 3
         ];

     }
     function get_items($keywords){
         $this->options['keywords'] = $keywords;
         $ch = curl_init();

         curl_setopt($ch, CURLOPT_URL, "https://product-search.api.cj.com/v2/product-search?website-id=" . $this->options['website-id'] . "&advertiser-ids=" . $this->options['advertiser-ids'] . "&keywords=" . $this->options['keywords']);
         curl_setopt($ch, CURLOPT_HEADER, true);
         curl_setopt($ch, CURLOPT_HTTPGET, true);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/xml", "authorization:".$this->options['authorization']));

        // $result = curl_exec($ch);

         // receive server response ...
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         $server_output = curl_exec($ch);
         curl_close($ch);
         $products = $this->parseResponse($server_output);

         $items = new SimpleXMLElement($products);
         $products = [];
         foreach ($items as $item) {
            $prod=[];
            $product = [];
             foreach($item as $it){
                 array_push($prod, strval($it));
             }

             $product = [
                 'ad-id' => $prod[0],
                 'advertiser-id' => $prod[1],
                 'advertiser-name' => $prod[2],
                 'advertiser-category' => $prod[3],
                 'buy-url' => $prod[4],
                 'catalog-id' => $prod[5],
                 'currency' => $prod[6],
                 'description' => $prod[7],
                 'image-url' => $prod[8],
                 'in-stock' => $prod[9],
                 'isbn' => null,
                 'manufacturer-name' => $prod[11],
                 'manufacturer-name' => $prod[12],
                 'name' => $prod[13],
                 'price'  => $prod[14],
                 'retail-price' => null,
                 'sale-price' => $prod[16],
                 'sku' => $prod[17],
                 'upc' => $prod[18]
             ];

            array_push($products, $product);
         }

         return $products;
    }


    function getItem($itemID){
         
    }

    // returns just products
    function parseResponse($data){
        $start = stripos($data, "<products");
        $end = stripos($data, "</products>");
        $body = substr($data, $start, ($end - $start) + 11);

        return $body;


    }


 }
?>