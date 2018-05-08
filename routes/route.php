<?php

$app->get('/users', function($request, $response){

	$email = "vishakha@gmail.in";
	$query = $GLOBALS['$con']->query("SELECT * FROM first_table");
    while($userDetails = $query->fetch_assoc())
    {
    	$result[] = $userDetails;	
    }

    //$data = '{"key":"Vishakha", "value":"123456"}';
    $result = json_encode($result);

    header('Content-Type: application/json');
    return $result;
    //return $name;
    //echo json_decode($data);
    //echo json_decode($data, true);
});

$app->post('/upload', function($request, $response){

    include_once __DIR__ . '/../sql/connection.php';
    
    //Getting all parameters
    $parameters = $request->getParams();
    $price = $parameters['price'];
    $quantity = $parameters['quantity'];

    $uploadedFiles = $request->getUploadedFiles();
    if(isset($uploadedFiles['image'])){
        $image = $uploadedFiles['image'];
        $imagePath = $image->file;
        $imageName = $image->getClientFilename(); 

        $image= file_get_contents($imagePath);
        $image= base64_encode($image);
    }

    if($image != null && $price != null && $quantity != null)
    {
        $query= "insert into imagestable(item_name, image, price, quantity) values ('$imageName','$image', $price, $quantity)";
        $result = $GLOBALS['$con']->query($query);
        if($result)
            return 'Photo uploaded';
        else
            return 'Unable to upload';
    } 
    else{
        return 'Missing Parameters';
    }  
});
