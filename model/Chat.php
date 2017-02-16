<?php
namespace model;

class Chat
{
    /**
     * @param $user
     * @return array
     */
    public function getAllUserMessage($user)
    {
        $apiFactory = new ApiFactory();
        $chatApi = $apiFactory->getChatApi();

        return $chatApi->getAllUserMessage($user);
    }

    /**
     * @param $group
     * @param $user
     * @return array
     */
    public function getGroupMessageByUser($group, $user)
    {
        $apiFactory = new ApiFactory();
        $chatApi = $apiFactory->getChatApi();

        return $chatApi->getGroupMessageByUser($group, $user);
    }

    /**
     * @param $user
     * @param $message
     * @return void
     */
    public function setUserMessage($user, $message)
    {
        $group = new Group();
        $groupId = $group->createGroupId();

        $apiFactory = new ApiFactory();
        $chatApi = $apiFactory->getChatApi();

        $chatApi->setUserMessage($user, $groupId, $message);
    }

}