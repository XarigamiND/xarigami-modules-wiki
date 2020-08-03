<?php
/**
 * Pass individual menu items to the admin menu
 *
 * @package modules
 * @subpackage Xarigami Wiki module
 * @copyright (C) 2007-2011 2skies.com
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 * @link http://xarigami.com/projects/wiki
 * @author Xarigami Team
 */

/**
 * Pass individual menu items to the admin  menu
 *
 * @return array containing the menulinks for the main menu items.
 */
function wiki_adminapi_getmenulinks()
{
    /* Security Check */
    if (xarSecurityCheck('AdminWiki', 0)) {
        /* We do the same for each new menu item that we want to add to our admin panels.
         * This creates the tree view for each item. Obviously, we don't need to add every
         * function, but we do need to have a way to navigate through the module.
         */
        $menulinks[] = array('url' => xarModURL('wiki','admin','modifyconfig'),
            /* In order to display the tool tips and label in any language,
             * we must encapsulate the calls in the xarML in the API.
             */
            'title' => xarML('Modify the configuration for the module'),
            'label' => xarML('Modify Config'),
            'active' => array('modifyconfig')
            );
    }
    /* If we return nothing, then we need to tell PHP this, in order to avoid an ugly
     * E_ALL error.
     */
    if (empty($menulinks)) {
        $menulinks = '';
    }
    /* The final thing that we need to do in this function is return the values back
     * to the main menu for display.
     */
    return $menulinks;
}
?>
