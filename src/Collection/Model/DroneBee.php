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

namespace BeeMee\Collection\Model;

/**
 * Class DroneBee
 * @package BeeMee\Collection\Model
 */
class DroneBee extends BeeAbstract
{
    /**
     * Type of the model
     *
     * @var string
     */
    protected $type = 'Drone';

    /**
     * Lifespan
     *
     * @var	integer
     */
    protected $lifespan = 50;

    /**
     * Points deducted from lifespan per hit
     *
     * @var	integer
     */
    protected $hitPoints = 12;

    /**
     * Current points
     *
     * @var	integer
     */
    protected $currentPoints = 50;
}