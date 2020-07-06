<?php


//class
//blueprint for data type on database
class User
{
    public $email;
    public $name;
    public function __construct($name, $email)
    {
        $this->email = $name;
        $this->name = $email;
    }
    public function login()
    {

        // echo 'the user logged in';
        echo $this->name . 'logged in';
    }
}

// $userOne = new User();

// $userOne->login();
// echo $userOne->email;
// echo $userOne->name;

$userTwo  = new User('peter', 'abcd$asdd');
echo $userTwo->name;
echo $userTwo->email;
$userTwo->login();
//read files
// $quotes = readfile('readme.txt');
// $file = 'readme.txt';

// $handle = fopen($file, 'r+'); //a+  point to the end

// echo fread($handle, filesize($file));
// echo fread($handle, 12);
//for single line
// echo fgets($handle);
// echo fgets($handle);
// echo fgets($handle);

//for single char
// echo fgetc($handle);

// //write to the file
// fwrite($handle, "\n everything popular is wrong");

// //close file
// fclose($handle);

// //delete file 
// unlink($file);
// if (file_exists($file)) {
//     //read file
//     echo readfile($file) . "<br/>";

//     //copy file
//     //copy($file, 'quotes.txt');

//     echo realpath($file) . "<br/>";

//     echo filesize($file) . "<br/>";

//     //rename file
//     rename($file, "test.txt");
// } else {

//     echo 'file does not exits';
// }

//make dir
// mkdir('quotes');

if (isset($_POST['submit'])) {

    setcookie('gender', $_POST['gender'], time() + 86400);
    session_start();

    $_SESSION['name'] = $_POST['name'];

    echo $_SESSION['name'];
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>php tutus</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name='name'>
        <select name="gender" id="">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name='submit' value='submit'>
    </form>
</body>

</html>