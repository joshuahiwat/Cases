<?php
namespace model;

final class Group
{
    /**
     * @return string
     */
    public function createGroupId()
    {
        return md5(uniqid(rand(), TRUE));
    }
}