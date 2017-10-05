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

namespace BeeMee\Facade;

use BeeMee\Collection\Collection;


class BeeGame
{
    protected $hive;

    public function __construct()
    {
        $this->hive = Collection::getInstance();
        $this->hive->initHive();
    }

    public function hitRandomBee()
    {
            echo "hitting";
            $bee = $this->hive->hitRandomBee();
            if (!$this->hive->getStatus()) {
                return false;
            }
            $this->hive->save();

        return [$this->hive->getHiveSize(), $bee];
    }

    public function resetHive()
    {
        $this->hive->reset();
    }

    public function getHiveSize()
    {
        return $this->hive->getHiveSize();
    }

    /**
     * @return mixed
     */
    public function getHive()
    {
        return $this->hive;
    }

    public function getBees()
    {
        return $this->hive->getBees();
    }

}