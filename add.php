<?php

include('config/db_connect.php');
//isset() check any value has been set
//$_GET post put glable var 
// if (isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }
//htmlspecialchars protect site from excute js
$title = $email = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');
if (isset($_POST['submit'])) {
    //check email
    if (empty($_POST['email'])) {
        $errors['email'] = "An email is require <br/>";
    } else {
        $email = $_POST['email'];
        //take two params,var,type of filter build in php
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email must be a valid email address';
        }
    }
    //check title
    if (empty($_POST['title'])) {
        $errors['title'] = "An title is require <br/>";
    } else {
        $title = $_POST['title'];
        //reg match, reg expess, var 
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        }
    }
    //check ingredients
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = "At least one ingredient is require <br/>";
    } else {
        $ingredients = $_POST['ingredients'];
        //reg match, reg expess, var 
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separeted list';
        }
    }

    if (array_filter($errors)) {
        // echo 'errors in the from';
    } else {
        //escape any bad data and save to db
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
        //need double qutote
        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

        //save to database and check
        if (mysqli_query($conn, $sql)) {
            //success
            //redirect the page function 
            header('Location:index.php');
        } else {
            //error
            echo 'query error' . mysqli_error($conn);
        }
        //echo 'form is valid';

    }
} //end of post check
?>
<!DOCTYPE html>
<html>

<?php include('template/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" class="white" method='POST'>
        <label for="">Your Email:</label>
        <input type="text" name="email" value='<?php echo htmlspecialchars($email) ?>'>
        <div class="red-text"><?php echo $errors['email'] ?></div>
        <label for="">Pizza Title:</label>
        <input type="text" name="title" value='<?php echo htmlspecialchars($title) ?>'>
        <div class="red-text"><?php echo $errors['title'] ?></div>
        <label for="">Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value='<?php echo htmlspecialchars($ingredients) ?>'>
        <div class="red-text"><?php echo $errors['ingredients'] ?></div>
        <div class="center">
            <input type="submit" name='submit' value='submit' class='btn brand z-depth-0'>
        </div>
    </form>
</section>
<?php include('template/footer.php'); ?>

</html>