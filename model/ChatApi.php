<?php
namespace model;

use PDO;

final class ChatApi
{

    /** @var PDO */
    private $db;

    /**
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->chatRepository = new ChatRepository($db);
        $this->db = $db;
    }

    /**
     * @param ChatRepository $users
     */
    public function getChatRepository(chatRepository $users)
    {
        $this->chatRepository = $users;
    }

    /**
     * @param $Uuid
     * @return array
     */
    public function getAllUserMessage($Uuid)
    {
        $userMessage = $this->chatRepository->getAllUserMessage($Uuid);

        return $userMessage;
    }

    /**
     * @param $group
     * @param $user
     * @return array
     */
    public function getGroupMessageByUser($group, $user)
    {
        $groupMessage = $this->chatRepository->getGroupMessageByUser($group, $user);

        return $groupMessage;
    }

    /**
     * @param $user
     * @param $group
     * @param $message
     * @return void
     */
    public function setUserMessage($user, $group, $message)
    {
        $this->chatRepository->createChat($user, $group, $message);
    }
}