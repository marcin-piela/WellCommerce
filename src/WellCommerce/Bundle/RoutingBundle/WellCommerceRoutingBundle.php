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

namespace WellCommerce\Bundle\RoutingBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WellCommerce\Bundle\RoutingBundle\DependencyInjection\Compiler\RouteGeneratorPass;

/**
 * Class WellCommerceRoutingBundle
 *
 * @package WellCommerce\Bundle\RoutingBundle
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class WellCommerceRoutingBundle extends Bundle
{
    /**
     * Build the container
     *
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new RouteGeneratorPass());
    }
}
