<?php
/**
 * Modify module's configuration
 *
 * @package modules
 * @subpackage Xarigami Wiki module
 * @copyright (C) 2007-2011 2skies.com
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 * @link http://xarigami.com/projects/wiki
 * @author Xarigami Team
 */

/**
 * Modify module's configuration
 * @return array
 */
function wiki_admin_modifyconfig()
{

    $data = array();

    /* common menu configuration */
    $data['menulinks'] = xarModAPIFunc('wiki','admin','getmenulinks');

    if (!xarSecurityCheck('AdminWiki',0)) return xarResponseForbidden();

    /* Generate a one-time authorisation code for this operation */
    $data['authid'] = xarSecGenAuthKey();

    /* Specify some values for display */
    $data['AllowedProtocols'] = xarModGetVar('wiki', 'AllowedProtocols') ;
    $data['InlineImages'] = xarModGetVar('wiki', 'InlineImages');
    $data['ExtlinkNewWindow'] = xarModGetVar('wiki', 'ExtlinkNewWindow');
    $data['IntlinkNewWindow'] = xarModGetVar('wiki', 'IntlinkNewWindow');
    $data['FieldSeparator'] = xarModGetVar('wiki', 'FieldSeparator');
    $data['WithHTML'] = xarModGetVar('wiki', 'WithHTML') ? true : false;
/*
    $data['shorturlschecked'] = xarModGetVar('wiki', 'SupportShortURLs') ? true : false;
    $data['useAliasName'] = xarModGetVar('wiki', 'useModuleAlias');
    $data['aliasname ']= xarModGetVar('wiki','aliasname');
*/
    $hooks = xarModCallHooks('module', 'modifyconfig', 'wiki',
                       array('module' => 'wiki'));
    if (empty($hooks)) {
        $data['hooks'] = array('categories' => xarML('You can assign base categories by enabling the categories hooks for wiki module'));
    } else {
        $data['hooks'] = $hooks;

         /* You can use the output from individual hooks in your template too, e.g. with
         * $hooks['categories'], $hooks['dynamicdata'], $hooks['keywords'] etc.
         */
        $data['hookoutput'] = $hooks;
    }

    /* Return the template variables defined in this function */
    return $data;
}
?>