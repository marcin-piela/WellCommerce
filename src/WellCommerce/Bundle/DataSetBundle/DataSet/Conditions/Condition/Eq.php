<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\DataSetBundle\DataSet\Conditions\Condition;

use WellCommerce\Bundle\DataSetBundle\DataSet\Conditions\AbstractCondition;
use WellCommerce\Bundle\DataSetBundle\DataSet\Conditions\ConditionInterface;

/**
 * Class Eq
 *
 * @package WellCommerce\Bundle\DataSetBundle\DataSet\Conditions\Condition
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Eq extends AbstractCondition implements ConditionInterface
{
    protected $operator = 'eq';
} 