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

namespace WellCommerce\Bundle\AvailabilityBundle\DataSet;

use WellCommerce\Bundle\DataSetBundle\AbstractDataSet;
use WellCommerce\Bundle\DataSetBundle\DataSetInterface;
use WellCommerce\Bundle\DataSetBundle\DataSetConfiguratorInterface;

/**
 * Class AvailabilityDataSet
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AvailabilityDataSet extends AbstractDataSet implements DataSetInterface
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(DataSetConfiguratorInterface $configurator)
    {
        $configurator->setColumns([
            'id'   => 'availability.id',
            'name' => 'availability_translation.name',
        ]);
    }
}
