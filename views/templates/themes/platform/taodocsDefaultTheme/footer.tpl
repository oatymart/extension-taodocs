<?php
use oat\tao\helpers\Layout;
use oat\tao\helpers\ApplicationHelper;
?>
<footer class="dark-bar">
    © 2013 - <?= date('Y') ?> · <span class="tao-version"><?= ApplicationHelper::getVersionName() ?></span> ·
    Open Assessment Technologies S.A.
    · <?= __('All rights reserved.') ?>
    <?php $releaseMsgData = Layout::getReleaseMsgData();
    if ($releaseMsgData['msg'] && ($releaseMsgData['is-unstable'] || $releaseMsgData['is-sandbox'])): ?>
        <span class="rgt">
            <?php if ($releaseMsgData['is-unstable']): ?>
            <span class="icon-warning"></span>
            <?php endif; ?>
            <?=$releaseMsgData['version-type']?> ·
        <a href="<?=$releaseMsgData['link']?>" target="_blank"><?=$releaseMsgData['msg']?></a></span>
    <?php endif; ?>
</footer>