<?php
/**
 * author: steven
 * date: 4/22/17 1:34 AM
 */
if(isset($document) && $document instanceof \Portal\Common\Model\DocumentModel){
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title><?= $document->getHeader()->getTitle() ?></title>
        <meta name="robots" content="NOINDEX,NOFOLLOW">
        <!--suppress HtmlUnknownTarget -->
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/vnd.microsoft.icon">
        <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/global.css"/>
        <?php
        if(!empty($document->getHeader()->getStylesheets())){
            foreach ($document->getHeader()->getStylesheets() as $stylesheet){
                ?>
                <link rel="stylesheet" href="<?= $stylesheet ?>"/>
                <?php
            }
        }
        ?>
        <!--suppress JSUnresolvedLibraryURL -->
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <?php
        if(!empty($document->getHeader()->getScripts())){
            foreach ($document->getHeader()->getScripts() as $script){
                ?>
                <script type="text/javascript" src="<?= $script ?>"></script>
                <?php
            }
        }
        ?>
    </head>
    <body>
    <section class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/">
                            <!--suppress HtmlUnknownTarget -->
                            <img src="/images/mm.png" class="logo">
                        </a>
                        <span class="page-title">MatahariMall Platform Portal</span>
                    </div>
                    <span class="col-md-11"></span>
                </div>
            </div>
            <div class="panel-body"><?= $document->getBody()->getContent() ?></div>
            <div class="panel-footer text-center">
                Copyright &copy; <?= gmdate('Y') ?> by MatahariMall.com
            </div>
        </div>
    </section>
    <?php
    if(!empty($document->getBody()->getScripts())){
        foreach ($document->getBody()->getScripts() as $script){
            ?>
            <script type="text/javascript" src="<?= $script ?>"></script>
            <?php
        }
    }
    ?>
    </body>
    </html>
<?php
}
?>