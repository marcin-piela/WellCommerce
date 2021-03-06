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

namespace WellCommerce\Bundle\ClientBundle\Repository;

use WellCommerce\Bundle\CoreBundle\Repository\AbstractEntityRepository;

/**
 * Class ClientGroupRepository
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ClientRepository extends AbstractEntityRepository implements ClientGroupRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDataSetQueryBuilder()
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->groupBy('client.id');
        $queryBuilder->leftJoin('client.group', 'client_group');
        $queryBuilder->leftJoin('client_group.translations', 'client_group_translation');

        return $queryBuilder;
    }
}
