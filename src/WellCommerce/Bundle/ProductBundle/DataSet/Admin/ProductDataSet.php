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

namespace WellCommerce\Bundle\ProductBundle\DataSet\Admin;

use WellCommerce\Bundle\DataSetBundle\AbstractDataSet;
use WellCommerce\Bundle\DataSetBundle\DataSetConfiguratorInterface;
use WellCommerce\Bundle\DataSetBundle\DataSetInterface;

/**
 * Class ProductDataSet
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductDataSet extends AbstractDataSet implements DataSetInterface
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(DataSetConfiguratorInterface $configurator)
    {
        $configurator->setColumns([
            'id'        => 'product.id',
            'name'      => 'product_translation.name',
            'sku'       => 'product.sku',
            'weight'    => 'product.weight',
            'sellPrice' => 'product.sellPrice',
            'stock'     => 'product.stock',
            'category'  => 'GROUP_CONCAT(categories_translation.name)',
        ]);
    }
}
