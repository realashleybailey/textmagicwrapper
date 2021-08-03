<?php

namespace Textmagic;

class TextmagicClient
{
    public function __construct($USERNAME, $APIkey)
    {
        $this->username = $USERNAME;
        $this->APIkey = $APIkey;
    }


    public function Send($MESSAGE, $PHONES, $OPTIONS)
    {
        $function = __FUNCTION__;
        $className = __NAMESPACE__ . '\\Modals';
        $class = new $className();
        $array = $class->$function($MESSAGE, $PHONES, $OPTIONS);

        $client = new \Textmagic\Services\TextmagicRestClient($this->username, $this->APIkey);
        $send = new \Textmagic\Services\Models\Messages($client);

        try {
            $send->create(
                $array
            );
        } catch (\Exception $e) {
            if ($e instanceof \Textmagic\Services\RestException) {
                print '[ERROR] ' . $e->getMessage() . "\n";
                foreach ($e->getErrors() as $key => $value) {
                    print '[' . $key . '] ' . implode(',', $value) . "\n";
                }
            } else {
                print '[ERROR] ' . $e->getMessage() . "\n";
            }
            return;
        }
    }

    public static function PushOptions($options)
    {
        $array = [];

        if (isset($options) && is_array($options)) {
            foreach ($options as $option => $value) {
                $array[$option] = $value;
            }
        }

        return $array;
    }
}
