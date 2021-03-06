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

namespace WellCommerce\Bundle\ThemeBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use WellCommerce\Bundle\ThemeBundle\DependencyInjection\Compiler\TemplateResourcesPass;
use WellCommerce\Bundle\ThemeBundle\DependencyInjection\Compiler\ThemeCompilerPass;

/**
 * Class WellCommerceThemeBundle
 *
 * @package WellCommerce\Bundle\ThemeBundle
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class WellCommerceThemeBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ThemeCompilerPass());
        $container->addCompilerPass(new TemplateResourcesPass());
    }
}
