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

namespace WellCommerce\Bundle\AttributeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use WellCommerce\Bundle\IntlBundle\ORM\LocaleAwareInterface;

/**
 * AttributeGroupTranslation
 *
 * @ORM\Table(name="attribute_group_translation")
 * @ORM\Entity
 */
class AttributeGroupTranslation implements LocaleAwareInterface
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Returns translation ID.
     *
     * @return integer The ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns group name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets group name
     *
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
