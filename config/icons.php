<?php

/**
 * @return object
 */
function getIcons()
{
    $pathIcon16    = \Xmf\Module\Admin::iconUrl('', 16);
    $moduleDirName = basename(dirname(__DIR__));

    return (object)[
        'name'  => mb_strtoupper($moduleDirName) . ' IconConfigurator',
        'icons' => [
            'edit'    => "<img src='" . $pathIcon16 . "/edit.png'  alt=" . _EDIT . "' align='middle'>",
            'delete'  => "<img src='" . $pathIcon16 . "/delete.png' alt='" . _DELETE . "' align='middle'>",
            'clone'   => "<img src='" . $pathIcon16 . "/editcopy.png' alt='" . _CLONE . "' align='middle'>",
            'preview' => "<img src='" . $pathIcon16 . "/view.png' alt='" . _PREVIEW . "' align='middle'>",
            'print'   => "<img src='" . $pathIcon16 . "/printer.png' alt='" . _CLONE . "' align='middle'>",
            'pdf'     => "<img src='" . $pathIcon16 . "/pdf.png' alt='" . _CLONE . "' align='middle'>",
            'add'     => "<img src='" . $pathIcon16 . "/add.png' alt='" . _ADD . "' align='middle'>",
            '0'       => "<img src='" . $pathIcon16 . "/0.png' alt='" . 0 . "' align='middle'>",
            '1'       => "<img src='" . $pathIcon16 . "/1.png' alt='" . 1 . "' align='middle'>",
        ],
    ];
}
