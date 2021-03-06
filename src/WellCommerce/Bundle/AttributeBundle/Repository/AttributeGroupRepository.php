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
namespace WellCommerce\Bundle\AttributeBundle\Repository;

use WellCommerce\Bundle\CoreBundle\Repository\AbstractEntityRepository;

/**
 * Class AttributeGroupRepository
 *
 * @package WellCommerce\Bundle\AttributeBundle\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AttributeGroupRepository extends AbstractEntityRepository implements AttributeGroupRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        $qb     = parent::getQueryBuilder()
            ->addSelect('attribute_group.id, attribute_group_translation.name')
            ->leftJoin(
                'WellCommerce\Bundle\AttributeBundle\Entity\AttributeGroupTranslation',
                'attribute_group_translation',
                'WITH',
                'attribute_group.id = attribute_group_translation.translatable')
            ->addOrderBy('attribute_group_translation.name', 'ASC');
        $query  = $qb->getQuery();
        $result = $query->getArrayResult();

        return $result;
    }
}
