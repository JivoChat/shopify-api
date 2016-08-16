<?php

namespace ShopifyApi\Api;

/**
 * Class Product
 *
 * API calls that can be carried out on a Product
 */
class Product extends AbstractApi
{

    /** @var string $parameters_wrap */
    protected static $parameters_wrap = 'product';

    /** @var string $path */
    protected static $path = '/admin/products/#id#.json';

    /** @var array $fields */
    public static $fields = [
        'id',
        'title',
        'body_html',
        'vendor',
        'product_type',
        'created_at',
        'handle',
        'updated_at',
        'published_at',
        'template_suffix',
        'published_scope',
        'tags',
        'variants',
        'options',
        'images',
        'image'
    ];

    /** @var array $ignore_on_update_fields */
    public static $ignore_on_update_fields = [];

    /**
     * Find a Product
     *
     * @link https://help.shopify.com/api/reference/product#show
     *
     * @param string $id     the board's id
     * @param array  $params optional attributes
     *
     * @return array board info
     */
    public function show($id, array $params = [])
    {
        return $this->get($this->getPath($id), $params);
    }

    /**
     * Update a Product
     *
     * @link https://help.shopify.com/api/reference/product#update
     *
     * @param $id
     * @param array $params
     * @return array
     */
    public function update($id, array $params = [])
    {
        return $this->put($this->getPath(rawurlencode($id)), $params);
    }

}