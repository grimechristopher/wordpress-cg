<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <title><?php bloginfo('name'); ?></title>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="<?=bloginfo('description')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?=bloginfo('description')?>">
    <meta property="og:url" content="">
    <meta property="og:image" content="icon.png">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">

    <meta name="theme-color" content="#fafafa">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    <header class="site-header d-flex flex-column">

    </header>