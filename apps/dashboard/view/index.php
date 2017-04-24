<?php
/**
 * author: steven
 * date: 4/21/17 8:13 PM
 */
if (isset($document) && $document instanceof \Portal\Common\Model\DocumentModel) {
    /** @var \Portal\Dashboard\Model\DashboardModel $documentData */
    $documentData        = $document->getData();
    $groups              = $documentData->getGroups() ?: [];
    $selectedEnvironment = @$_GET['env'] ?: 'production';

    if (!empty($groups)) {
        ?>
        <ul class="nav nav-pills distance-bottom">
            <?php
            foreach ($groups as $v) {
                $menuItemClass = $v == $selectedEnvironment ? 'class="active"' : '';
                $menuItemText  = ucwords($v);
                ?>
                <li role="presentation" <?= $menuItemClass ?>>
                    <a href="javascript:void(0);" data-value="<?= $v ?>"><?= $menuItemText ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
        $entities = $documentData->getEntities() ?: [];
        if (!empty($entities)) {

            /** @noinspection HtmlUnknownTarget */
            $itemTemplate = <<<HTML
<div class="col-md-2 col-xs-2">
    <a href="{{href}}" class="thumbnail" target="_blank">
        <img src="{{icon}}" alt="{{title}}" class="item-icon">
        <div class="caption center-block text-center">
            <p class="">{{title}}</p>
        </div>
    </a>
</div>
HTML;

            foreach ($entities as $k => $entity) {
                $resultArray = [];
                $tabClass    = " $k " . ($k != $selectedEnvironment ? 'hidden' : 'show');

                if (!empty($entity)) {
                    ?>
                <div class="row <?= $tabClass ?>">
                    <div class="col-md-12">
                    <?php
                    for ($i = 1; $i <= count($entity); $i++) {
                        $item          = $entity[$i - 1];
                        $resultArray[] = str_replace(["{{href}}", "{{icon}}", "{{title}}"], [$item['href'], $item['icon'], $item['title']], $itemTemplate);
                    }

                    if (count($resultArray) > 6) {
                        $resultArray = array_chunk($resultArray, 6);
                    } else {
                        $resultArray = [$resultArray];
                    }

                    foreach ($resultArray as $row) {
                        $rowHtml  = implode('', $row);
                        ?>
                        <div class="row match-my-cols">
                            <?= $rowHtml ?>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
                    <?php
                }

            }
        }
    } else {
        ?>
        <span class="alert alert-warning">Cannot parse config.json</span>
        <?php
    }
} else {
?>
    <span class="alert alert-warning">Error Occurred. Please consult to the author.</span>
    <?php
}
