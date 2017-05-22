
<?php
include_once ('NeweggService.php');

$service = new NeweggService();
$items = $service->get_items('Asus+Monitor');

?>