<?php
// Online PHP compiler to run PHP program online
// Print "Hello World!" message

function getUser($id) {
    // Use the $id parameter in the API URL
    $api_url = 'https://driveplyr.appspages.online/dashboard/api/user.php?id=' . $id;
    
    // Fetch the API response as a JSON string
    return $api_response = file_get_contents($api_url);

}

// Call the getUser function with the ID '1'
echo $result = getUser('1').name;


?>
