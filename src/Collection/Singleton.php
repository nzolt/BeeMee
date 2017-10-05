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

namespace BeeMee\Collection;

/**
 * Class Singleton
 * @package BeeMee\Collection
 */
class Singleton
{
    /**
     * @var array
     */
    private static $instances = array();

    /**
     * Singleton constructor.
     */
    protected function __construct() {}

    /**
     * Singleton clone.
     */
    protected function __clone() {}

    /**
     * Singleton getInstance.
     *
     * @return mixed
     */
    public static function getInstance()
    {
        $cls = get_called_class();
        if(isset($_SESSION['hive'])) {
            self::$instances[$cls] = unserialize($_SESSION['hive']);
        } elseif (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static;
        }
        return self::$instances[$cls];
    }

    protected function resetSingleton()
    {
        unset(self::$instances[get_called_class()]);
        var_dump(self::$instances);
    }
}