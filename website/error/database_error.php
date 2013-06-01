<?php include '../view/header.php'; ?>
<div id="main">
    <h1 class="top">Database Error</h1>
    <p>There was an error connecting to the database.</p>
    <p>The database must be installed and running.</p>
    <p>Please check that MySQL is running.</p>
    <p>Error message: <?php echo $error_message; ?></p>
    <p>&nbsp;</p>
</div><!-- end main -->
<?php include '../view/footer.php'; ?>