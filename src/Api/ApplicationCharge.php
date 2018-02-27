<?php

namespace ShopifyApi\Api;

use ShopifyApi\Api\Traits\OwnsMetafields;

/**
 * Class ApplicationCharge
 *
 * API calls that can be carried out on a ScriptTag
 */
class ApplicationCharge extends AbstractApi
{

    /** @var string $parameters_wrap */
    protected static $parameters_wrap = 'application_charges';

    /** @var string $parameters_wrap_many */
    protected static $parameters_wrap_many = 'application_charges';

    /** @var string $path */
    protected static $path = '/admin/application_charges/#id#.json';

    /** @var array $fields */
    public static $fields = [
        'confirmation_url',
        'name',
        'id',
        'created_at',
        'updated_at',
        'price',
        'return_url',
        'status',
        'test'
    ];

    /** @var array $ignore_on_update_fields */
    public static $ignore_on_update_fields = [];

    /**
     * Retrieve all scripts (api limit is 250)
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#index
     *
     * @param array $params
     * @return array
     */
    public function all(array $params = [])
    {
        return $this->get('/admin/application_charges.json', $params);
    }

    /**
     * Find an ApplicationCharge
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#show
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
        $application_charge = $params;

        return $this->post('/admin/application_charges.json', compact('application_charge'));
    }

    /**
     * Delete a ScriptTag
     *
     * @link https://help.shopify.com/api/reference/scripttag#destroy
     *
     * @param $id
     * @return array
     */
    public function activate($id)
    {
        return $this->post($this->getPath(rawurlencode($id)));
    }

}