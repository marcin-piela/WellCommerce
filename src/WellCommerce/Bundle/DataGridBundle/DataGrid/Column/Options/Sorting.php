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

namespace WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class Sorting
 *
 * @package WellCommerce\Bundle\DataGridBundle\DataGrid\Column\Options
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Sorting extends AbstractOptions
{
    const SORT_DIR_ASC  = 'GF_Datagrid.SORT_DIR_ASC';
    const SORT_DIR_DESC = 'GF_Datagrid.SORT_DIR_DESC';

    protected function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'allowed',
            'default_order'
        ]);

        $resolver->setDefaults([
            'allowed'       => true,
            'default_order' => self::SORT_DIR_DESC
        ]);

        $resolver->setAllowedValues([
            'allowed'       => [true, false],
            'default_order' => [self::SORT_DIR_DESC, self::SORT_DIR_ASC]
        ]);
    }
}