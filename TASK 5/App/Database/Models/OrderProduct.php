<?php

namespace App\Database\Models;

use App\Database\Contracts\ConnectTo;
use App\Database\Models\Model;

class OrderProduct extends Model implements ConnectTo
{
    private const table = "orders_products";
    private int $order_id;
    private int $product_id;
    private float $price;
    private int $quantity;

    /**
     * Get the value of order_id
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
    public function getLatestProduct()
    {
        $query = "SELECT `products`.`id`, `products`.`name_en`,`products`.`image`, `products`.`price`, COUNT(`product_id`) AS `num_of_products_in_one_order` FROM `orders_products` LEFT JOIN `products` ON `products`.`id` = `orders_products`.`product_id` GROUP BY `product_id` ORDER BY `num_of_products_in_one_order` DESC LIMIT 4";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
