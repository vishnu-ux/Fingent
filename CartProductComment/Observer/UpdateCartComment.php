<?php
namespace Fingent\CartProductComment\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class UpdateCartComment
 * @package Fingent\CartProductComment\Observer
 */
class UpdateCartComment implements ObserverInterface
{
    /**
     * save product comment in quote_item tbale
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $infoDataObject = $observer->getEvent()->getInfo();
        $cart = $observer->getEvent()->getCart();
        $data = $infoDataObject->getData();
        foreach ($data as $itemId => $itemInfo) {
            $item = $cart->getQuote()->getItemById($itemId);
            $comment = $itemInfo['comments'];
            if (empty($comment)) {
                continue;
            } else {
                $item->setItemcomment($comment);
            }
        }
    }
}
