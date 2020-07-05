<?php
//Mysqli or PDO
//connect to database
$conn = mysqli_connect('localhost', 'peter', '123456', 'ninijia_pizza');

//check connection
if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
//write query for all pizzas
$sql = 'SELECT title,ingredients,id FROM pizzas ORDER BY create_at';

//make query & get result
// connection and sql    
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connect with database
mysqli_close($conn);

//split the string into array
// print_r(explode(',', $pizzas[0]['ingredients']));


?>
<!DOCTYPE html>
<html>

<?php include('template/header.php'); ?>
<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza) : ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) : ?>
                                <li>
                                    <?php echo htmlspecialchars($ing); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class='card-action right-align'>
                        <a href="#" class="brand-text-info">more info</a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include('template/footer.php'); ?>

</html>