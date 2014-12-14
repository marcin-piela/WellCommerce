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

namespace WellCommerce\Bundle\DataSetBundle\DataSet;

use WellCommerce\Bundle\DataSetBundle\DataSet\Request\DataSetRequest;

/**
 * Interface DataSetInterface
 *
 * @package WellCommerce\Bundle\DataSetBundle\DataSet
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface DataSetInterface
{
    const EVENT_POST_CONFIGURE = 'dataset.post_configure';

    /**
     * Initializes dataset and returns results
     *
     * @param DataSetRequest $request
     *
     * @return mixed
     */
    public function getResults(DataSetRequest $request);
}