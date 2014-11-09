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
namespace WellCommerce\Bundle\IntlBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use WellCommerce\Bundle\CoreBundle\EventListener\AbstractEventSubscriber;

/**
 * Class LocaleSubscriber
 *
 * @package WellCommerce\Bundle\IntlBundle\EventListener
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LocaleSubscriber extends AbstractEventSubscriber
{
    private $defaultLocale;

    public function __construct($defaultLocale = 'en')
    {
        $this->defaultLocale = $defaultLocale;
    }

    public static function getSubscribedEvents()
    {
        return parent::getSubscribedEvents() + [
            KernelEvents::REQUEST    => ['onKernelRequest', 17],
            KernelEvents::CONTROLLER => ['onKernelController', -256],
        ];
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        } else {
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $locale = $event->getRequest()->getLocale();

        // skip fetching locales when handling sub-request
        if ($event->getRequestType() == HttpKernelInterface::SUB_REQUEST) {
            return;
        }

        if (!$this->container->get('session')->has('admin/locales')) {
            $locales = $this->container->get('locale.repository')->getAvailableLocales();
            $this->container->get('session')->set('admin/locales', $locales);
        }
    }
}