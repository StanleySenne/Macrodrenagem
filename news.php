<?php
include("layout/header-external.php");
?>

    <script src="js/news.js"></script>

<?php
if (isset($_GET['news'])) {
    include("inserts/news-details.html");
} else {
    include("inserts/news-list.html");
}
include("layout/footer.php");
