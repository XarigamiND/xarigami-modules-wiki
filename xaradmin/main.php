<?php
/**
 * Wiki Module main admin function
 *
 * @package modules
 * @copyright (C) 2002-2005 by the Xaraya Development Team.
 * @subpackage Xarigami Wiki module
 * @copyright (C) 2007-2011 2skies.com
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 * @link http://xarigami.com/projects/wiki
 * @author Xarigami Team
 */

function wiki_admin_main()
{

   return xarModFunc('wiki', 'admin', 'modifyconfig');
}

?>