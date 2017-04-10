<?php
/**
 * Author: steven
 * Date: 4/5/17
 * Time: 11:28 AM
 */

//read json config with format:
//{
//  <env>:[{
//      title: <entity_title>,
//      icon: <icon_url>,
//      href: <link>
//  }]
//}

$template = '';
$groups   = [];

try {
    $entities = json_decode(file_get_contents('config.json'), true);
    $groups   = array_keys($entities);
} catch (Exception $exception) {
    $entities = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MM Portal</title>
    <meta name="robots" content="NOINDEX,NOFOLLOW">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        .page-title {
            font-size: 2em;
            height: 100%;
            vertical-align: middle;
            margin-left: 10px;
        }

        .logo {
            height: 50px;
        }

        .distance-bottom {
            margin-bottom: 20px;
        }

        .item-icon {
            max-width: 120px;
            max-height: 120px;
        }
    </style>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>
<body>
<section class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-5">
                    <a href="/">
                        <img src="images/mm.png" class="logo">
                    </a>
                    <span class="page-title">MatahariMall Platform Portal</span>
                </div>
                <span class="col-md-11"></span>
            </div>
        </div>
        <div class="panel-body">
            <?php
            if (!empty($groups)) {
                $selectedEnvironment = @$_GET['env'] ?: 'production';
                ?>
                <ul class="nav nav-pills distance-bottom">
                    <?php
                    foreach ($groups as $v) {
                        ?>
                        <li role="presentation" <?= $v == $selectedEnvironment ? 'class="active"' : '' ?>>
                            <a href="javascript:void(0);" data-value="<?= $v ?>"><?= ucwords($v) ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <?php

                if (!empty($entities)) {
                    foreach ($entities as $k => $entity) {
                        ?>
                        <div class="row <?= $k ?> <?= $k != $selectedEnvironment ? 'hidden' : 'show' ?>">
                            <?php
                            if (!empty($entity)) {
                                foreach ($entity as $item) {
                                    ?>
                                    <div class="col-md-2">
                                        <a href="<?= $item['href'] ?>" class="thumbnail" target="_blank">
                                            <img src="<?= $item['icon'] ?>" alt="<?= $item['title'] ?>" class="item-icon">
                                            <div class="caption center-block text-center">
                                                <span class="label label-primary"><?= $item['title'] ?></span>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <span class="alert alert-warning">Cannot parse config.json</span>
                <?php
            }
            ?>
        </div>
        <div class="panel-footer">
            Copyright &copy; <?= date('Y') ?> by MatahariMall.com
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        let $panelBody = $('.panel-body');
        $('.nav.nav-pills li a').on('click', function (e) {
            e.preventDefault();
            let $this = $(this);
            let target = $this.data('value');
            $panelBody.find('.row.'+target)
                .removeClass('hidden')
                .addClass('show')
                .siblings('.row')
                .removeClass('show')
                .addClass('hidden');
            $this.closest('li').addClass('active').siblings('li').removeClass('active');
        });
    });
</script>
</body>
</html>
