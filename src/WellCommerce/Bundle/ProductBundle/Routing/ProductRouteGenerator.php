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

namespace WellCommerce\Bundle\ProductBundle\Routing;

use WellCommerce\Bundle\RoutingBundle\Generator\AbstractRouteGenerator;
use WellCommerce\Bundle\RoutingBundle\Generator\RouteGeneratorInterface;

/**
 * Class ProductRouteGenerator
 *
 * @package WellCommerce\Bundle\ProductBundle\Routing
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductRouteGenerator extends AbstractRouteGenerator implements RouteGeneratorInterface
{
    const GENERATOR_STRATEGY = 'product';

    public function supports($strategy)
    {
        return self::GENERATOR_STRATEGY === $strategy;
    }
} 