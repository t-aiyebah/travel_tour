<?php


$connection = mysqli_connect('localhost', 'root', '', 'book_db');

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($location) || empty($guests) || empty($arrivals) || empty($leaving)) {
        echo "All fields are required.";
    }

    $request = " insert into book_form(name, email, phone, address, location, guests, arrivals, leaving) values 
    ('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving')";

    mysqli_query($connection, $request);

    header('location:book.php');
}else{
    echo 'something went wrong try again';
}
?>
 