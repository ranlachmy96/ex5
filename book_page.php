<?php
include "db.php";

?>
<?php
$bookID = $_GET["book_id"];
$query = "SELECT * FROM tbl_35_books where book_id=" . $bookID;

$result = mysqli_query($connection, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
} else
    die("DB query failed.");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book page Ran lachmy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>HOME / PRODUCTS</header>
    <main>
        <section id="mainWrapper">
            <section id="bookListWrraper">
                <?php
                $img = $row["Path_to_front_image"];
                if (!$img)
                    $img = "images/one_piece_front";
                $backImg = $row["path_to_back_image"];
                echo '<section class="bookAndTextWrapper">';
                echo '<section class="doubleBookWrraper">';
                echo '<img src="' . $img . '" alt="' . $row["book_name"] . '" title="' . $row["book_name"] . '" class="bookImg">';
                echo '<img src="' . $backImg . '" alt="' . $row["book_name"] . '" title="' . $row["book_name"] . '" class="bookImg">';
                echo '</section>';
                echo '<span> <b>' . $row["book_name"] . '</b></span>';
                echo '<span>category: ' . $row["category"] . '</span>';
                echo '<span>' . $row["author"] . '</span>';
                echo '<p>' . $row["synopsis"] . '</p>';
                echo '</section>';
                ?>
            </section>
        </section>
        <?php
        mysqli_free_result($result);
        ?>
    </main>
    <footer>
        <section id="footer-right-side-wrapper">
            <a href="index.php" id="logo"></a>
            <span>&copy;2023 All Rights Reserved. Privacy | Terms of Service</span>
        </section>
    </footer>
</body>

</html>
<?php
mysqli_close($connection);
?>