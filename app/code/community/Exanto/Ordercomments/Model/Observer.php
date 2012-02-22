<?php
/**
 * Catch:
 *     Mage::dispatchEvent('checkout_type_onepage_save_order', array('order'=>$order, 'quote'=>$quote));
 * From:
 *     Sales/Model/Service/Quote.php
 */

class Exanto_Ordercomments_Model_Observer
{
    /**
     * Add a customer order comment when the order is placed
     * @param object $event
     * @return
     */
    public function setOrderComment(Varien_Event_Observer $observer)
    {
        $_order = $observer->getEvent()->getOrder();
        $_request = Mage::app()->getRequest();
        $_comments = strip_tags($_request->getParam('customerOrderComment'));
        if ( ! empty($_comments)) {
            $_order->setCustomerNote($_comments);
        }
        return $this;
    }
}