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
namespace WellCommerce\Core\Migration;

use WellCommerce\Core\Migration;

/**
 * Migration1404562788
 *
 * This class has been auto-generated
 * by the WellCommerce Console migrate:add command
 */
class Migration1404562788 extends AbstractMigration implements MigrationInterface
{
    public function up()
    {
        if (!$this->getDb()->schema()->hasTable('address_type')) {
            $this->getDb()->schema()->create('address_type', function ($table) {
                $table->increments('id');
                $table->integer('type');
                $table->string('name');
            });
        }
    }

    public function down()
    {

    }
}