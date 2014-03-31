<?php
function encodeDetect($keytitle,$terminal) {
    $encode = mb_detect_encoding($keytitle, array('ASCII', 'EUC-CN','GB2312', 'GBK', 'UTF-8'));
    $keytitle = iconv($encode, $terminal, $keytitle);
    return $keytitle;
}
?>