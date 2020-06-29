<div id="help-template" class="outer">
    <{include file=$smarty.const._MI_PUBLISHER_HELP_HEADER}>

    <h4 class="odd">DESCRIPTION</h4><br>

    <p class="even">Publisher module is a Publishing Solution for your XOOPS Site<br> <br>
    </p>

    <h4 class="odd">INSTALL/UNINSTALL</h4>

    <p class="even">1) No special measures necessary, follow the standard installation process –
        extract the module folder into the ../modules directory. Install the
        module through Admin -> System Module -> Modules.<br> <br>
        Detailed instructions on installing modules are available in the
        <a target="_blank" href="https://xoops.gitbook.io/xoops-operations-guide/details">XOOPS Operations Manual</a></p>

    <p class="even"><strong>2) PDF in XOOPS 2.5.8 </strong><br> <br>
    If you want to use the PDF feature in Publisher, you will need to copy the TCPDF library to your XOOPS folder:<br> <br>

    /class/libraries/vendor/<br> <br>

    a) create the folders there:<br> <br>

    /tecnickcom/tcpdf/<br> <br>

    so it looks like:<br> <br>

    /class/libraries/vendor/tecnickcom/tcpdf/<br> <br>

    b) download the TCPDF library and place the content in the above folder. You have three choices:<br> <br>

    i) download the streamlined XOOPS version from <a target="_blank" href="http://sourceforge.net/projects/chgxoops/files/Frameworks/tcpdf_for_xoops/">SourceForge</a>,
        which was developed by Cedric<br> <br>

    ii) download the latest full release from <a target="_blank" href="https://github.com/tecnickcom/TCPDF/releases">TCPDF on GitHub</a> <br> <br>

    iii) If you feel comfortable with <a target="_blank" href="https://xoops.gitbook.io/xoops-operations-guide/details">Composer</a>,
        add this line to your "composer.js" file located in /class/libraries/:<br> <br>

    <strong>"tecnickcom/tcpdf":"6.*"</strong><br> <br>

    and then run the command:<br> <br>

        <strong>composer update</strong><br> <br>

    Your PDF should now work.
    </p>

    <h4 class="odd">OPERATING INSTRUCTIONS</h4>
    <p class="even">
    This module and its operations are very simple.<br> <br>
    Detailed instructions on configuring the access rights for user groups are available in the
    <a target="_blank" href="https://xoops.gitbook.io/xoops-operations-guide/details">XOOPS Operations Manual</a>, and more detailed information about Publisher itself is in the Publisher
    Tutorial (see below)<br> <br>
    </p>

    <h4 class="odd">TUTORIAL</h4>

    <p class="even">
        Tutorial has been started, but we might need your help! Please check out the status of the tutorial <a href="https://xoops.gitbook.io/publisher-tutorial/" target="_blank">here </a>.
        <br><br>To contribute to this Tutorial, <a href="https://github.com/XoopsDocs/publisher-tutorial/" target="_blank">please fork it on GitHub</a>.
        <br> This document describes our <a href="https://xoops.gitbook.io/xoops-documentation-process/details/" target="_blank">Documentation Process</a> and it will help you to understand how to contribute.
        <br><br>
        There are more XOOPS Tutorials, so check them out in our <a href="https://www.gitbook.com/@xoops/" target="_blank">XOOPS Tutorial Repository on GitBook</a>.
    </p>


    <h4 class="odd">TRANSLATIONS</h4>
    <p class="even">Translations are on <a href="https://www.transifex.com/xoops/" target="_blank">Transifex</a> and in our <a href="https://github.com/XoopsLanguages/" target="_blank">XOOPS Languages Repository on GitHub</a>.</p>

    <h4 class="odd">SUPPORT</h4>
    <p class="even">If you have questions about this module and need help, you can visit our <a href="https://xoops.org/modules/newbb/viewforum.php?forum=28/" target="_blank">Support Forums on XOOPS Website</a></p>

    <h4 class="odd">DEVELOPMENT</h4>
    <p class="even">This module is Open Source and we would love your help in making it better! You can fork this module on <a href="https://github.com/XoopsModulesArchive/publisher" target="_blank">GitHub</a><br><br>
        But there is more happening on GitHub:<br><br>
        - <a href="https://github.com/xoops" target="_blank">XOOPS Core</a> <br>
        - <a href="https://github.com/XoopsModules25x" target="_blank">XOOPS Modules</a><br>
        - <a href="https://github.com/XoopsThemes" target="_blank">XOOPS Themes</a><br><br>
        Go check it out, and <strong>GET INVOLVED</strong>

    </p>

</div>