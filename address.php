<?php
include_once './staticHeaded.php';
include_once './sql/connection.php';

if(isset($_POST['SubmitButton'])){ //check if form was submitted
    echo 'submit called';
    $full_name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $pin = $_POST['pin'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $landmark = $_POST['landmark'];
    $city = $_POST['town'];
    $state = $_POST['state'];
    
    $queryToAddAddress = $GLOBALS['$con']->query("INSERT INTO addressBook (userID,fullName,mobileNO,pinCode,address1,address2,landmark,city,state) 
                VALUES ('1','$full_name','$mobile','$pin','$address1','$address2','$landmark','$city','$state')");
    if($queryToAddAddress)
        echo 'Added successfully';
    else
        echo 'Not added';
}

//Creating the table if it doesn't exist
$query = $GLOBALS['$con']->query("SHOW TABLES LIKE 'addressBook'");
if($query->num_rows == 0){
echo 'Going inside tables loop';
$sql = "CREATE TABLE addressBook (
        addressID int NOT NULL AUTO_INCREMENT,
        userID int NOT NULL,
        fullName varchar(255) NOT NULL,
        mobileNO bigint NOT NULL,
        pinCode int NOT NULL,
        address1 varchar(255) NOT NULL,
        address2 varchar(255),
        landmark varchar(50) NOT NULL,
        city varchar(50) NOT NULL,
        state varchar(50) NOT NULL,
        PRIMARY KEY (addressID),
        FOREIGN KEY (userID) REFERENCES first_table(id)
)";
$query = $GLOBALS['$con']->query($sql) or die($GLOBALS['$con']->error);
if($query)
    echo 'Table created';
else
    echo 'Table not created';
}

?>
<!DOCTYPE html>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="./css/itemCards.css">
    </head>
    <body>
        <h1>Address page called</h1> 
        <h4>Add a new address</h4><br>
        <form name="login" id="login" action='' method="post">
        Full Name<span style="color: red">*</span><br><input type="text" id="name" name="name" required><br><br>
        Mobile number<span style="color: red">*</span><br><input type="text" id="mobile" name="mobile" required><br><br>
        Pincode<span style="color: red">*</span><br><input type="text" id="pin" name="pin" required><br><br>
        Flat, House no., Building, Company, Apartment<span style="color: red">*</span><br><textarea rows="4" id="address1" name="address1" required></textarea><br><br>
        Area, Colony, Street:<br><input type="text" id="address2" name="address2"><br><br>
        Landmark:<br><input type="text" id="landmark" name="landmark" placeholder="optional"><br><br>
        Town/City<span style="color: red">*</span><br><input type="text" id="town" name="town" required><br><br>
        State<span style="color: red">*</span><br><input type="text" id="state" name="state" required><br><br>
        <button type="submit" value="Submit" name="SubmitButton" onclick="return addAddress()">Add</button>
        </form>  

        <script>
        function addAddress()
        {
            alert("Going inside addAddress");
            var name = document.getElementById("name").value;
            var phone = document.getElementById("mobile").value;
            var pin = document.getElementById("pin").value;
            if(name === "")
            {
                alert ("Name field cannot be blank");
                return false;
            }
            if(!(/^[a-zA-Z]*$/g.test(name)))
            {
                alert ("Invalid name format");
                return false;
            }
                //var phoneno = /^\d{10}$/;
            if(!(phone.match(/^\d{10}$/)))
            {
                alert ("Invalid mobile number");
                return false;
            }
            if(!(pin.match(/^\d*$/)))
            {
                alert ("Invalid pin");
                return false;
            }
        }    
       </script>
    </body>
</html>

