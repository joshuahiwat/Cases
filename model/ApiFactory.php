<?php

namespace model;

use core\CoreApiFactory;

final class ApiFactory
{

    public function getChatApi()
    {
        $CoreApiFactory = new CoreApiFactory();

        return new ChatApi($CoreApiFactory->getDatabase());
    }
}