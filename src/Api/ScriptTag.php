<?php

namespace ShopifyApi\Api;

use ShopifyApi\Api\Traits\OwnsMetafields;

/**
 * Class ScriptTag
 *
 * API calls that can be carried out on a ScriptTag
 */
class ScriptTag extends AbstractApi
{

    /** @var string $parameters_wrap */
    protected static $parameters_wrap = 'script_tag';

    /** @var string $parameters_wrap_many */
    protected static $parameters_wrap_many = 'script_tags';

    /** @var string $path */
    protected static $path = '/admin/script_tags/#id#.json';

    /** @var array $fields */
    public static $fields = [
        'id',
        'created_at',
        'updated_at',
        'display_scope',
        'src',
        'event'
    ];

    /** @var array $ignore_on_update_fields */
    public static $ignore_on_update_fields = [];

    /**
     * Retrieve all scripts (api limit is 250)
     *
     * @link https://help.shopify.com/api/reference/scripttag#index
     *
     * @param array $params
     * @return array
     */
    public function all(array $params = [])
    {
        return $this->get('/admin/script_tags.json', $params);
    }

    /**
     * Retrieve the number of scripts
     *
     * @link https://help.shopify.com/api/reference/scripttag#count
     *
     * @param array $params
     * @return integer
     */
    public function count(array $params = [])
    {
        $count = $this->get('/admin/script_tags/count.json', $params);
        return isset($count['count'])
            ? $count['count'] : 0;
    }

    /**
     * Find a ScriptTag
     *
     * @link https://help.shopify.com/api/reference/scripttag#show
     *
     * @param string $id     the board's id
     * @param array  $params optional attributes
     * @return array
     */
    public function show($id, array $params = [])
    {
        return $this->get($this->getPath($id), $params);
    }

    /**
     * Create a ScriptTag
     *
     * @link https://help.shopify.com/api/reference/scripttag#create
     *
     * @param array  $params Attributes
     * @return array
     */
    public function create(array $params = array())
    {
        $script_tag = $params;

        return $this->post('/admin/script_tags.json', compact('script_tag'));
    }

    /**
     * Update a ScriptTag
     *
     * @link https://help.shopify.com/api/reference/scripttag#update
     *
     * @param $id
     * @param array $params
     * @return array
     */
    public function update($id, array $params = [])
    {
        return $this->put($this->getPath(rawurlencode($id)), $params);
    }

    /**
     * Delete a ScriptTag
     *
     * @link https://help.shopify.com/api/reference/scripttag#destroy
     *
     * @param $id
     * @return array
     */
    public function remove($id)
    {
        return $this->delete($this->getPath(rawurlencode($id)));
    }

}