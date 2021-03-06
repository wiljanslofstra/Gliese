<?php include(__DIR__ . '/../system/config.php'); ?>
<?php include(__DIR__ . '/../system/common_functions.php'); ?>
<?php
    $meta_title = 'Gliese';
    $meta_desc = 'Front-end starter kit';
    $meta_sitename = 'Gliese';
    $meta_img = ASSET_PATH . '/icons/apple-touch-icon.png';
    $meta_url = '/';
    $meta_twitter = '@twitter';
?>
<!DOCTYPE html>
<html class="no-js" lang="nl">
<head>
    <meta charset="utf-8">

    <title><?= $meta_title; ?></title>

    <meta name="author" content="<?= $meta_sitename; ?>">
    <meta name="description" content="<?= $meta_desc; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= $meta_twitter; ?>">
    <meta name="twitter:creator" content="<?= $meta_sitename; ?>">
    <meta name="twitter:title" content="<?= $meta_title; ?>">
    <meta name="twitter:description" content="<?= $meta_desc; ?>">
    <meta name="twitter:image:src" content="<?= $meta_img; ?>">

    <meta property="og:url" content="<?= $meta_url; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $meta_title; ?>">
    <meta property="og:image" content="<?= $meta_img; ?>"/>
    <meta property="og:description" content="<?= $meta_desc; ?>">
    <meta property="og:site_name" content="<?= $meta_sitename; ?>">

    <!-- TODO: Place Icons -->

    <script type="text/javascript">
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
        var BASE = '<?= BASE_URL; ?>';
        var dataLayer = [];

        function trackJavaScriptError(r){var e=window.event||{},a=r.message||e.errorMessage,o=(r.filename||e.errorUrl)+": "+(r.lineno||e.errorLine),n="";void 0!==r.error&&r.error&&"undefined"!==r.error.stack&&(n=r.error.stack),"undefined"!=typeof dataLayer&&dataLayer.push({event:"error_event",error_name:"Error",error_message:o+": "+a,error_stack:n})}window.addEventListener("error",trackJavaScriptError,!1);
    </script>

    <link rel="stylesheet" href="<?= getRevedFile('/assets/dist/css/main.css'); ?>">
</head>

<body>
    <?php
        $sprite = file_get_contents(__DIR__ . '/../assets/dist/icons/symbol-defs.svg');
        echo $sprite;
    ?>

    <a class="sr-only sr-only-focusable" href="#main">
        Go to content
    </a>

    <!--[if lte IE 9]>
        <p class="browserupgrade">
            You're using an outdated browser. <a href="http://browsehappy.com/">Update your browser</a> for a better experience.
        </p>
    <![endif]-->
