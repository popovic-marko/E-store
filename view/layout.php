<html>
<head>
    <title><?php echo $title ?></title>
    <?php include 'view/headerTags.php' ?>
    <?php if (isset($css)) {
        echo $css;
    }
    ?>
</head>
<body>
    <?php include 'menu.php' ?>
    <?php echo $content ?>
    <?php if (isset($js)) {
        echo $js;
    }
    ?>
    <?php include 'view/footer.php';?>
</body>
</html>

