<?php
namespace model;

use PDO;

final class ChatRepository
{
    const DELETED = 0;

    /**
     * @var PDO
     */
    private $db;

    /**
     * users constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param $Uuid
     * @return array
     */
    public function getAllUserMessage($Uuid)
    {
        $userId = $Uuid;
        $deleted = trim(self::DELETED);

        $sql_query = $this->db->prepare('SELECT * FROM chat WHERE user_id = :user_id AND deleted = :deleted');

        $sql_query->bindParam(':user_id', $userId);
        $sql_query->bindParam(':deleted', $deleted);
        $sql_query->execute();
        $sql = $sql_query->fetchAll(PDO::FETCH_ASSOC);

        return $sql;
    }

    /**
     * @param $group
     * @param $Uuid
     * @return array
     */
    public function getGroupMessageByUser($group, $Uuid)
    {
        $userId = $Uuid;
        $groupId = $group;
        $deleted = trim(self::DELETED);

        $sql_query = $this->db->prepare('SELECT * FROM chat WHERE group_id = :group_id AND user_id = :user_id AND deleted = :deleted');

        $sql_query->bindParam(':group_id', $groupId);
        $sql_query->bindParam(':user_id', $userId);
        $sql_query->bindParam(':deleted', $deleted);
        $sql_query->execute();
        $sql = $sql_query->fetchAll(PDO::FETCH_ASSOC);

        return $sql;
    }

    /**
     * @param $Uuid
     * @param $groupId
     * @param $message
     * @return void
     */
    public function createChat($Uuid, $groupId, $message)
    {
        $deleted = trim(self::DELETED);

        $sql_query = $this->db->prepare('INSERT INTO chat (group_id, user_id, chat_id, message, created_at, deleted) VALUES (:group_id, :user_id, :chat_id, :message, NOW(), :deleted)');

        $sql_query->bindParam(':group_id', $groupId);
        $sql_query->bindParam(':user_id', $Uuid);
        $sql_query->bindParam(':chat_id', $chatId);
        $sql_query->bindParam(':message', $message);
        $sql_query->bindParam(':deleted', $deleted);
        $sql_query->execute();
    }
}