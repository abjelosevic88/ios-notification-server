<?php
/**
 * Created by PhpStorm.
 * User: Aleksandar
 * Date: 9/16/16
 * Time: 5:46 PM
 */

namespace App\Transformers;

use App\Message;
use League\Fractal\TransformerAbstract;

class MessageTransformer extends TransformerAbstract
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
     * @param Message $message
     * @return array
     */
    public function transform(Message $message)
    {
        return [
            'title' => $message->title,
            'message' => $message->message,
            'publish_date' => $message->publish_date
        ];
    }
}
