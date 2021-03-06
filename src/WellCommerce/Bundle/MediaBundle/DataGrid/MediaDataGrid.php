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
namespace WellCommerce\Bundle\MediaBundle\DataGrid;

use WellCommerce\Bundle\DataGridBundle\AbstractDataGrid;
use WellCommerce\Bundle\DataGridBundle\Column\Column;
use WellCommerce\Bundle\DataGridBundle\Column\ColumnCollection;
use WellCommerce\Bundle\DataGridBundle\Column\Options\Appearance;
use WellCommerce\Bundle\DataGridBundle\Column\Options\Filter;
use WellCommerce\Bundle\DataGridBundle\Column\Options\Sorting;
use WellCommerce\Bundle\DataGridBundle\Configuration\EventHandler\LoadedEventHandler;
use WellCommerce\Bundle\DataGridBundle\Configuration\EventHandler\ProcessEventHandler;
use WellCommerce\Bundle\DataGridBundle\DataGridInterface;
use WellCommerce\Bundle\DataGridBundle\Options\OptionsInterface;

/**
 * Class MediaDataGrid
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class MediaDataGrid extends AbstractDataGrid implements DataGridInterface
{
    /**
     * {@inheritdoc}
     */
    public function configureColumns(ColumnCollection $collection)
    {
        $collection->add(new Column([
            'id'         => 'id',
            'caption'    => $this->trans('media.id'),
            'sorting'    => new Sorting([
                'default_order' => Sorting::SORT_DIR_DESC,
            ]),
            'appearance' => new Appearance([
                'visible' => false,
            ]),
            'filter'     => new Filter([
                'type' => Filter ::FILTER_BETWEEN,
            ]),
        ]));

        $collection->add(new Column([
            'id'         => 'preview',
            'caption'    => $this->trans('media.preview'),
            'appearance' => new Appearance([
                'width' => 30,
                'align' => Appearance::ALIGN_CENTER,
            ]),
        ]));

        $collection->add(new Column([
            'id'         => 'name',
            'caption'    => $this->trans('media.name'),
        ]));

        $collection->add(new Column([
            'id'         => 'mime',
            'caption'    => $this->trans('media.mime'),
        ]));

        $collection->add(new Column([
            'id'         => 'extension',
            'caption'    => $this->trans('media.extension'),
        ]));

        $collection->add(new Column([
            'id'         => 'size',
            'caption'    => $this->trans('media.size'),
        ]));
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsInterface $options)
    {
        parent::configureOptions($options);

        $eventHandlers = $options->getEventHandlers();

        $eventHandlers->add(new ProcessEventHandler([
            'function' => $this->getJavascriptFunctionName('process'),
        ]));

        $eventHandlers->add(new LoadedEventHandler([
            'function' => $this->getJavascriptFunctionName('data_loaded'),
        ]));
    }
}
