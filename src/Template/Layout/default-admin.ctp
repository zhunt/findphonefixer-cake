<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php // echo $this->Html->css('base.css') ?>
    <?php echo $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/app.css">

    <style>
        .admin a:hover { text-decoration: underline;}
        .admin select { height: auto;}

        .admin fieldset legend {
            border-bottom: 2px solid #2196f3;
            width: 100%;
            line-height: 2rem;
        }
        .admin legend { color: #2196f3 }

        .admin button { cursor: auto }

        .admin input[type="text"], textarea {

            -webkit-appearance: none;
            -moz-appearance: none;
            border-radius: 0;
            background-color: #fff;
            border-style: solid;
            border-width: 1px;
            border-color: #ccc;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            color: rgba(0, 0, 0, 0.75);
            display: block;
            font-family: inherit;
            font-size: 0.875rem;
            height: 2.3125rem;
            margin: 0 0 1rem 0;
            padding: 0.5rem;
            width: 100%;
        }

        .date select, .time select, .datetime select {
            display: inline;
            width: auto;
            margin-right: 10px;
        }

        .form button[type="submit"] {
            float: right;
            text-transform: uppercase;
            box-shadow: none;
        }


    </style>

</head>
<body class="admin">
    <nav class="row column" data-topbar role="navigation">
        <h1><a href=""><?= $this->fetch('title') ?></a></h1>
    </nav>

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDoAxSn-EXf2vJSj3LRH9FIFNyz7JuGf8U"></script>
    <script src="/assets/js/app.js"></script>

</body>
</html>
