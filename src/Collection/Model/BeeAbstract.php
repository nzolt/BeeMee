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
 * Class BeeAbstract
 * @package BeeMee\Collection\Model
 */
abstract class BeeAbstract implements BeeInterface
{
    /**
     * Id of the model
     *
     * @var int
     */
    protected $id;

    /**
     * Type of the model
     *
     * @var string
     */
    protected $type = '';

	/**
	* Lifespan
	*
	* @var	integer
	*/
	protected $lifespan = 0;

	/**
	* Points deducted from lifespan per hit
	*
	* @var	integer
	*/
	protected $hitPoints = 0;

	/**
	* Current points
	*
	* @var	integer
	*/
	protected $currentPoints = 0;

	public function __construct($id)
    {
        $this->id = $id;
    }

    /**
	* Get life points.
	*
	* @return integer
	*/
	public function getCurrentPoints()
	{
		return $this->currentPoints;
	}

    /**
     * Get hit points
     *
     * @return int
     */
	public function getHit()
    {
        return $this->hitPoints;
    }

	/**
	* Deduct points from bee lofe points.
     *
     * @return BeeInterface
	*/
	public function hit()
	{
		if ($this->isAlive()){
			$this->currentPoints = max(0, ($this->currentPoints - $this->hitPoints));
		}

		return $this;
	}

	/**
	* The bee isAlive
	*
	* @return boolean
	*/
	public function isAlive()
	{
		return (bool)$this->currentPoints;
	}

    /**
     * Get the Id of the model
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the Type of the model
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the Name of the model
     *
     * @return int
     */
    public function getName()
    {
        return $this->getType() . ' Nr. ' . $this->getId();
    }
}