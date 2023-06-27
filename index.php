<?php
include "db.php";
?>
<?php
$query = "SELECT * FROM tbl_35_books";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("DB query failed.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book list Ran lachmy</title>
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
            <section id="selectGenre">
                <span>
                    Category
                </span>
            </section>
            <section id="bookListWrraper">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $img = $row["Path_to_front_image"];
                    if (!$img)
                        $img = "images/one_piece_front";
                    echo '<div class="' . $row["category"] . '">';
                    echo '<section class="bookAndTextWrapper">';
                    echo '<section class="bookWrraper">';
                    echo '<a href="book_page.php?book_id=' . $row["book_id"] . '">';
                    echo '<img src="' . $img . '" alt="' . $row["book_name"] . '" title="' . $row["book_name"] . '" class="bookImg">';
                    echo '</a>';
                    echo '</section>';
                    echo '<a href="book_page.php?book_id=' . $row["book_id"] . '">' . '<span>' . $row["book_name"] . '</span>' . '</a>';
                    echo '<span>' . $row["price"] . '$</span>';
                    echo '</section>';
                    echo '</div>';
                }
                ?>
            </section>
        </section>
        <?php
        mysqli_free_result($result);
        ?>
    </main>
    <footer>
        <section id="footer-right-side-wrapper">
            <a href="#" id="logo"></a>
            <span>&copy;2023 All Rights Reserved. Privacy | Terms of Service</span>
        </section>
    </footer>
    <script src="js/script.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>