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

namespace WellCommerce\Core\Component\DataGrid;

use Illuminate\Support\Manager;

/**
 * Interface DataGridQueryInterface
 *
 * @package WellCommerce\Core\Component\DataGrid
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface DataGridQueryInterface
{
    /**
     * Returns query object
     *
     * @param Manager $manager
     *
     * @return mixed
     */
    public function getQuery(Manager $manager);
} 