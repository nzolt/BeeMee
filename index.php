<?php
/**
 * Composer package
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   Time2
 * @package    Time2_BeeMee
 * @author     Time2 Digital Limited <zoltan.nagy@time2.digital>
 * @copyright  Copyright (c) 2017 Time2 Digital Limited (http://www.time2.digital)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace BeeMee;
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use BeeMee\Facade;

echo 'the Hive</br>';
$hive = new Facade\BeeGame();
echo "Nr. of Bees in Hive: " . $hive->getHiveSize();
if(isset($_POST['hit']) && $_POST['hit'] == 1) {
    list($hiveSize, $bee) = $hive->hitRandomBee();
    if($bee && $hiveSize){
        //echo 'number of living Bees on Hive: ' . $hiveSize;
        echo '</br>';
        echo "Hit: " . $bee->getName() . " with: " . $bee->getHit();
        echo '</br>';
        echo '</br>';
    }
}
?>

<form action="index.php" method="POST">
    <input type="hidden" name="hit" value="1"/>
    <input type="submit" value="Hit!" />
</form>
<br />
<form action="index.php" method="POST">
    <input type="hidden" name="reset" value="1"/>
    <input type="submit" value="Reset!" />
</form>
<?php
//var_dump($bee);
//var_dump($hive->getBees());
?>