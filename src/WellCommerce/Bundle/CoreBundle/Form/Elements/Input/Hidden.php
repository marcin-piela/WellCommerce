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

namespace WellCommerce\Bundle\CoreBundle\Form\Elements;

use WellCommerce\Bundle\CoreBundle\Form\Elements\Input\AbstractInputField;

/**
 * Class Hidden
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Hidden extends AbstractInputField implements ElementInterface
{
    /**
     * {@inheritdoc}
     */
    public function prepareAttributesJs()
    {
        return [
            $this->formatAttributeJs('name', 'sName'),
            $this->formatDependencyJs(),
        ];
    }
}