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

namespace WellCommerce\Bundle\AttributeBundle\Behat;

use WellCommerce\Bundle\CoreBundle\Behat\CoreContext;

/**
 * Class AttributeContext
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class AttributeContext extends CoreContext
{
    /**
     * @Given I am on the index page
     */
    public function iAmOnTheIndexPage()
    {
        $this->getSession()->visit($this->generateUrl('admin.attribute_group.index'));
    }
}