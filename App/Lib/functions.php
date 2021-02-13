<?php


/**
 * используется длы вывода шаблонов и лэйаутов
 * основное место в классе View
 * @param string $path,$layout
 */
function bufferView($path = '', $layout = 'default', $vars = [], $title = 'home')
{

    ob_start();

    require '../App/Views/' . $path . '.php';
    $content = ob_get_clean();

    require '../App/Views/' . $layout . '.php';
}
