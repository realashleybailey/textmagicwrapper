<?php

namespace Textmagic;

class Modals
{
    public function Send($message, $phones, $options)
    {
        $array = [];

        $array['text'] = $message;
        $array['phones'] = implode(', ', $phones);

        $array += \Textmagic\TextmagicClient::PushOptions($options);

        return $array;
    }
}
