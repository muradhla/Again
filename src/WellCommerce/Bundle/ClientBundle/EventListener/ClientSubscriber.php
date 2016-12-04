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
namespace WellCommerce\Bundle\ClientBundle\EventListener;

use WellCommerce\Bundle\ClientBundle\Entity\ClientInterface;
use WellCommerce\Bundle\CoreBundle\Event\EntityEvent;
use WellCommerce\Bundle\CoreBundle\EventListener\AbstractEventSubscriber;

/**
 * Class ClientSubscriber
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ClientSubscriber extends AbstractEventSubscriber
{
    public static function getSubscribedEvents()
    {
        return [
            'client.post_init'   => ['onClientPostInit'],
            'client.post_create' => ['onClientPostCreate'],
        ];
    }
    
    public function onClientPostInit(EntityEvent $event)
    {
        $client = $event->getEntity();
        $shop   = $this->getShopStorage()->getCurrentShop();
        if ($client instanceof ClientInterface) {
            $client->setShop($shop);
            $client->getBillingAddress()->setCountry($shop->getDefaultCountry());
            $client->getShippingAddress()->setCountry($shop->getDefaultCountry());
            $client->setClientGroup($shop->getClientGroup());
        }
    }
    
    public function onClientPostCreate(EntityEvent $event)
    {
//        $client = $event->getEntity();
//        if ($client instanceof ClientInterface) {
//            $this->getMailerHelper()->sendEmail([
//                'recipient'     => $client->getContactDetails()->getEmail(),
//                'subject'       => $this->getTranslatorHelper()->trans('client.email.heading.register'),
//                'template'      => 'WellCommerceAppBundle:Email:register.html.twig',
//                'parameters'    => [
//                    'client' => $client,
//                ],
//                'configuration' => $client->getShop()->getMailerConfiguration(),
//            ]);
//        }
    }
}
