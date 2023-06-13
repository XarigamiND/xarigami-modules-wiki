<?php
/**
 * Standard function to update module configuration parameters
 *
 * @package modules
 * @copyright (C) 2002-2005 by the Xaraya Development Team.
 * @subpackage Xarigami Wiki module
 * @copyright (C) 2007-2011 2skies.com
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 * @link http://xarigami.com/projects/wiki
 * @author Xarigami Team
 */

/**
 * Standard function to update module configuration parameters
 */
function wiki_admin_updateconfig()
{

    if (!xarVarFetch('AllowedProtocols', 'str:1:', $AllowedProtocols, 'http|https|mailto|ftp|news|gopher', XARVAR_NOT_REQUIRED)) return;
    if (!xarVarFetch('InlineImages',     'str:1:', $InlineImages, 'png|jpg|gif', XARVAR_NOT_REQUIRED)) return;
    if (!xarVarFetch('FieldSeparator',   'str:1',  $FieldSeparator, '|', XARVAR_NOT_REQUIRED)) return;
    if (!xarVarFetch('WithHTML',   'checkbox',  $WithHTML, FALSE, XARVAR_NOT_REQUIRED)) return;
    if (!xarVarFetch('UseCreoleSyntax',   'checkbox',  $UseCreoleSyntax, FALSE, XARVAR_NOT_REQUIRED)) return;
    if (!xarSecConfirmAuthKey()) return;
    xarModSetVar('wiki', 'AllowedProtocols', $AllowedProtocols);
    xarModSetVar('wiki', 'InlineImages', $InlineImages);
    xarModSetVar('wiki', 'FieldSeparator', $FieldSeparator);
    xarModSetVar('wiki', 'WithHTML', $WithHTML);
    xarModSetVar('wiki', 'UseCreoleSyntax', $UseCreoleSyntax);
    /*
    if (isset($aliasname) && trim($aliasname)<>'') {
        xarModSetVar('example', 'useModuleAlias', $modulealias);
    } else{
         xarModSetVar('example', 'useModuleAlias', 0);
    }
    $currentalias = xarModGetVar('example','aliasname');
    $newalias = trim($aliasname);

    if ( strpos($newalias,'_') === FALSE )
    {
        $newalias = str_replace(' ','_',$newalias);
    }
    $hasalias= xarModGetAlias($currentalias);
    $useAliasName= xarModGetVar('example','useModuleAlias');
    //<jojodee> we need to ensure any old aliases are deleted
    1. Use mod alias chosen - has a valid alias given
       - if it the same as existing alias - do nothing else
       - remove any existing alias, set the mod vars to true and new alias
    2. Use mod alias chosen - no valid alias
       - remove any existing alias, set the mod vars to false and empty
    3. Do not use module alias
       - remove any existing alias, set the mod vars to false and empty

    // if a new one is set or if there is an old one there and we don't want to use alias anymore
    if ($useAliasName && !empty($newalias)) {
         if ($aliasname != $currentalias)

            if (isset($hasalias) && ($hasalias =='example')){
                xarModDelAlias($currentalias,'example');
            }

            $newalias = xarModSetAlias($newalias,'example');
            if (!$newalias) { //name already taken so unset
                 xarModSetVar('example', 'aliasname', '');
                 xarModSetVar('example', 'useModuleAlias', false);
            } else { //it's ok to set the new alias name
                xarModSetVar('example', 'aliasname', $aliasname);
                xarModSetVar('example', 'useModuleAlias', $modulealias);
            }
    } else {
       //remove any existing alias and set the vars to none and false
            if (isset($hasalias) && ($hasalias =='example')){
                xarModDelAlias($currentalias,'example');
            }
            xarModSetVar('example', 'aliasname', '');
            xarModSetVar('example', 'useModuleAlias', false);
    }

    */
    xarModCallHooks('module','updateconfig','wiki',
                   array('module' => 'wiki'));

    $msg = xarML('Wiki configuration settings were successfully updated.');
        xarTplSetMessage($msg,'status');
    /* This function generated no output, and so now it is complete we redirect
     * the user to an appropriate page for them to carry on their work
     */
    xarResponseRedirect(xarModURL('wiki', 'admin', 'modifyconfig'));

    /* Return */
    return true;
}
?>
