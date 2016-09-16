<?php
/**
 * Created by PhpStorm.
 * User: Aleksandar
 * Date: 9/16/16
 * Time: 5:46 PM
 */

namespace App\Transformers;

use App\Application;
use League\Fractal\TransformerAbstract;

class ApplicationTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * Turn this item object into a generic array
     *
     * @param Application $application
     * @return array
     */
    public function transform(Application $application)
    {
        return [
            'name' => $application->name,
            'key' => $application->key
        ];
    }
}
