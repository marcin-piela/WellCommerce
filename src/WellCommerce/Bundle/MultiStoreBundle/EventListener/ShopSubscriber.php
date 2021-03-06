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
namespace WellCommerce\Bundle\MultiStoreBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use WellCommerce\Bundle\CoreBundle\EventListener\AbstractEventSubscriber;

/**
 * Class ShopSubscriber
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class ShopSubscriber extends AbstractEventSubscriber
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => ['onKernelController', -256],
            KernelEvents::REQUEST    => ['onKernelRequest', -256],
            'shop.post_update'       => 'onShopListModified',
            'shop.post_create'       => 'onShopListModified',
            'shop.post_remove'       => 'onShopListModified',
        ];
    }

    /**
     * Event triggered during kernel request.
     * Sets current shop scope if session is available.
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if ($request->hasSession()) {
            $url          = $request->server->get('HTTP_HOST');
            $context      = $this->container->get('shop.context');
            $themeManager = $this->container->get('theme.manager');

            $context->setCurrentScopeByUrl($url);
            $themeManager->setCurrentTheme($context->getCurrentScope()->getTheme());
        }
    }

    /**
     * Clears session data after shop list was changed
     */
    public function onShopListModified()
    {
        $this->container->get('session')->remove('admin/shops');
    }

    /**
     * Registers all available shops in admin session
     *
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        if ($event->getRequestType() == HttpKernelInterface::SUB_REQUEST) {
            return;
        }

        if (!$this->container->get('session')->has('admin/shops')) {
            $shops = $this->container->get('shop.collection')->getSelect();
            $this->container->get('session')->set('admin/shops', $shops);
        }
    }
}
