<?php

namespace Fingent\CartProductComment\Plugin;

use Magento\Quote\Model\Quote\Item\ToOrderItem;
/**
 * Class QuoteItemToOrderItemPlugin
 * @package Fingent\CartProductComment\Plugin
 */
class QuoteItemToOrderItemPlugin
{
    /**
     * @param ToOrderItem $subject
     * @param callable $proceed
     * @param $quoteItem
     * @param $data
     * @return mixed
     */
    public function aroundConvert(ToOrderItem $subject, callable $proceed, $quoteItem, $data)
    {

        // get order item
        $orderItem = $proceed($quoteItem, $data);

        // get your custom attribute from quote_item .
        $quoteItemComment = $quoteItem->getItemcomment();

        //set custom attribute to sales_order_item
        $orderItem->setItemcomment($quoteItemComment);

        return $orderItem;
    }
}
