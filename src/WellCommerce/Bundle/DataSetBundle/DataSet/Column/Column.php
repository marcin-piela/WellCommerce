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

namespace WellCommerce\Bundle\DataSetBundle\DataSet\Column;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class Column
 *
 * @package WellCommerce\Bundle\DataSetBundle\DataSet\Column
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Column extends AbstractColumn implements ColumnInterface
{
    protected function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'alias',
            'source',
            'aggregated',
        ]);

        $resolver->setOptional([
            'transformer'
        ]);

        $resolver->setDefaults([
            'aggregated' => false
        ]);

        $resolver->setAllowedTypes([
            'transformer' => 'WellCommerce\Bundle\DataSetBundle\DataSet\Transformer\TransformerInterface'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return $this->options['alias'];
    }

    /**
     * {@inheritdoc}
     */
    public function getSource()
    {
        return $this->options['source'];
    }

    /**
     * {@inheritdoc}
     */
    public function getRawSelect()
    {
        return sprintf('%s AS %s', $this->options['source'], $this->options['alias']);
    }

    /**
     * {@inheritdoc}
     */
    public function isAggregated()
    {
        return $this->options['aggregated'];
    }

    /**
     * {@inheritdoc}
     */
    public function getTransformer()
    {
        return $this->options['transformer'];
    }

    /**
     * {@inheritdoc}
     */
    public function hasTransformer()
    {
        return (isset($this->options['transformer']) && null !== $this->options['transformer']);
    }
}