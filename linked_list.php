<?php

class Node
{
    public $data = NULL;
    public $nextNode = NULL;

    public function __construct($data)
    {
        $this->data = $data;
    }
}

class LinkedList
{
    public $firstNode = NULL;

    public function insert($data)
    {
        $newNode = new Node($data);
        $currentNode = $this->firstNode;
        $prevNode = NULL;

        if($currentNode === NULL){
            $this->firstNode = $newNode;
            $currentNode = $newNode;
            return;
        }

        while($currentNode->nextNode !== NULL){
            $prevNode = $currentNode;
            $currentNode = $currentNode->nextNode;
        }

        $currentNode->nextNode = $newNode;

    }

    public function traverse()
    {
        $currentNode = $this->firstNode;
        while($currentNode !== NULL){
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->nextNode;
        }
    }
}

$list = new LinkedList();
$list->insert(1);
$list->insert(2);

echo "Linked List: \n";
$list->traverse();
