<?php



// Database connection details
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "paccapro";       

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandname = $_POST['Brand_name'];
    $Category = $_POST['Category'];
    $Product = $_POST['Product'];
    $Colour = $_POST['Color'];
    $Version = $_POST['Version'];
    $Unitmeasurement = $_POST['Unit_Measurement'];
    $Weightmeasurement = $_POST['Weight_Measurement'];
    $Weightdimension = $_POST['Weight_Dimention'];
    $Packingmeasurement = $_POST['Packing_Measurement'];
    $Futureversion = $_POST['Future_Version'];
    $Procode = $_POST['pro_code'];
    $Parentproduct = $_POST['Parent_Product'];
    $Passcategory = $_POST['pass_category'];

    $stmt = $conn->prepare("INSERT INTO products (Brand_name, Category, Product, Color,Version, Unit_Measurement, Weight_Measurement, Weight_Dimention, Packing_Measurement, Future_Version, pro_code, Parent_Product, pass_category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssissssssss", $brandname, $Category, $Product, $Colour, $Version, $Unitmeasurement, $Weightmeasurement, $Weightdimension, $Packingmeasurement, $Futureversion, $Procode, $Parentproduct, $Passcategory);
    if ($stmt->execute()) {
        header("Location: index-1.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();

?>