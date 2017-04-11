<?php

namespace Encount\Sender;

use Encount\Sender\SenderInterface;
use Encount\Collector\EncountCollector;
use Faultline\Instance;

class Faultline implements SenderInterface
{
    /**
     * send.
     */
    public function send($config, EncountCollector $collector)
    {
        $exc = new \Airbrake\Errors\Base($collector->description, array_slice(debug_backtrace(), 2));
        $notice = Instance::buildNotice($exc);
        // type
        $notice['errors'][0]['type'] = $collector->errorType;
        // component
        // action
        $params = $collector->requestParams;
        if (!empty($params['params']['controller'])) {
            $notice['context']['component'] = $params['params']['controller'];
        }
        if (!empty($params['params']['action'])) {
            $notice['context']['action'] = $params['params']['action'];
        }
        $notice['context']['url'] = $collector->url ? $collector->url : "";

        return Instance::sendNotice($notice);
    }
}
