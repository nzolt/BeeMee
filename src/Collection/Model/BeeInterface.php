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
 * Interface BeeInterface
 * @package BeeMee\Collection\Model
 */
interface BeeInterface
{
	/**
	* Gets points value.
	*
	* @return integer Points value.
	*/
	public function getCurrentPoints();

	/**
	* Deduce points of bee.
	*/
	public function hit();

	/**
	* Is the bee isAlive?
	*
	* @return boolean
	*/
	public function isAlive();

    /**
     * Get the Id of the model
     *
     * @return int
     */
    public function getId();

    /**
     * Get the Type of the model
     *
     * @return int
     */
    public function getType();

    /**
     * Get the Name of the model
     *
     * @return int
     */
    public function getName();
}