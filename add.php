<?php
//isset() check any value has been set
//$_GET post put glable var 
// if (isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }
//htmlspecialchars protect site from excute js
if (isset($_POST['submit'])) {
    //check email
    if (empty($_POST['email'])) {
        echo "An email is require <br/>";
    } else {
        echo htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['title'])) {
        echo "An title is require <br/>";
    } else {
        echo htmlspecialchars($_POST['title']);
    }

    if (empty($_POST['ingredients'])) {
        echo "At least one ingredient is require <br/>";
    } else {
        echo htmlspecialchars($_POST['ingredients']);
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
        <input type="text" name="email">
        <label for="">Pizza Title:</label>
        <input type="text" name="title">
        <label for="">Ingredients (comma separated):</label>
        <input type="text" name="ingredients">
        <div class="center">
            <input type="submit" name='submit' value='submit' class='btn brand z-depth-0'>
        </div>
    </form>
</section>
<?php include('template/footer.php'); ?>

</html>