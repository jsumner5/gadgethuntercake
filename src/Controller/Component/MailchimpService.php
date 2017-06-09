<?php

/**
 * Created by PhpStorm.
 * User: Jerold
 * Date: 6/8/2017
 * Time: 8:23 PM
 */
class MailchimpService{

    function MailchimpService(){
        $this->apiKey = '4759215a7913f1d111287ca7e725faf4-us14';
        $this->listId = 'e02f7061e4';
        $this->memberId = md5(strtolower($this->data['email']));
        $this->dataCenter = substr($this->apiKey,strpos($this->apiKey,'-')+1);
        $this->url = 'https://' . $this->dataCenter . '.api.mailchimp.com/3.0/lists/' . $this->listId . '/members/' . $this->memberId;

    }

    function addSubscriber($data) {

        $json = json_encode([
            'email_address' => $data['email'],
            'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
            'merge_fields'  => [
                'FNAME'     => $data['firstname']
            ]
        ]);

        $ch = curl_init($this->url);

        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $this->apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode;
    }
}