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

use BeeMee\Collection\Model;
use BeeMee\Exception;

/**
 * Class Collection
 * @package BeeMee\Collection
 */
class Collection extends Singleton
{
    /**
     * @var array
     */
    protected $hiveSpec = [
        'BeeMee\\Collection\\Model\\QueenBee' => 1,
        'BeeMee\\Collection\\Model\\WorkerBee' => 5,
        'BeeMee\\Collection\\Model\\DroneBee' => 8
    ];

    protected $status = true;

    /**
     * Hive of Bees
     *
     * @var array
     */
    protected $hive = [];

    /**
     * Nr. of Bees in the Hive
     *
     * @var int
     */
    public $totalBees = 0;

    public function getStatus()
    {
        return $this->status;
    }

    public function getHiveSize()
    {
        return count($this->hive);
    }

    /**
     * Initialize the Hive with Bees
     *
     * @return $this
     * @throws Exception\BeeMeeHiveException
     */
    public function initHive()
    {
        if (count($this->hive) == 0) {
            foreach ($this->hiveSpec as $type => $nr) {
                for ($b = 1; $nr >= $b; $b++) {
                    try {
                        $bee = new $type($b);
                        $this->registerBee($bee);
                    } catch (\Exception $e) {
                        throw new Exception\BeeMeeHiveException();
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Hit a random Bee
     *
     * @return $this
     */
    public function hitRandomBee()
    {
        $beeKey = array_rand($this->hive);
        $bee = $this->hive[$beeKey];

        if($bee->isAlive()) {
            $bee->hit();
            if($bee->getCurrentPoints() == 0) {
                // Remove the dead Bee from Hive
                unset($this->hive[$beeKey]);
                if($bee->type = 'Queen') {
                    // Queen is dead, reset the game
                    $this->reset();
                    $this->initHive();
                    $this->status = false;
                }
                //Reindex the Hive
                $this->hive = array_values($this->hive);
            }

            $this->save();
            return $bee;
        }
    }

    /**
     * Register new Bee in Hive
     *
     * @param $bee
     * @return $this
     */
    protected function registerBee(Model\BeeInterface $bee)
    {
        if (is_subclass_of($bee, 'BeeMee\\Collection\\Model\\BeeInterface')) {
            $this->hive[] = $bee;
            $this->totalBees++;
        }

        return $this;
    }

    /**
     * Save to Session
     *
     * @return void
     * @throws Exception\BeeMeeSessionException
     */
    public function save()
    {
        try {
            $_SESSION['hive'] = serialize($this);
        } catch (\Exception $e) {
            throw new Exception\BeeMeeSessionException();
        }
    }

    /**
     * Get Bees from the Hive (Collection)
     *
     * @return array
     */
    public function getBees()
    {
        return $this->hive;
    }

    public function reset()
    {
        unset($_SESSION['hive']);
        $this->resetSingleton();
        //$this->save();
    }
}