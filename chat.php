<?php

use model\Chat;

$chat = new Chat();

$userMessages = $chat->getAllUserMessage('lol');
$newChat = $chat->setUserMessage(2, 'hello world');

echo json_encode($userMessages);