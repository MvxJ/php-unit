<?php

/**
 * Order
 *
 * An example order class
 */
class Order
{
    public float $amount = 0;
    public int $quantity = 0;
    public int $unitPrice = 0;

    public function __construct(int $quantity, float $unitPrice)
    {
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;

        $this->amount = $quantity * $unitPrice;
    }

    /**
     * Process the order
     *
     * @return boolean
     */
    public function process(PaymentGateway $gateway)
    {
        return $gateway->charge($this->amount);
    }
}
