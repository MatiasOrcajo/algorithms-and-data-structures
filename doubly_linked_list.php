<?php

class Node
{
    public Node|null $prevNode;
    public int $value;
    public Node|null $nextNode;

    public function __construct(int $value, int $prev = NULL, int $next = NULL)
    {
        $this->value = $value;
        $this->prevNode = $prev;
        $this->nextNode = $next;
    }
}

class DoublyLinkedList
{

    public Node|null $firstNode = null;
    public Node|null $prevNode = null;

    public function insert(int $value)
    {
        $node = new Node($value);
        $currentNode = $this->firstNode;

        if ($currentNode === null) {
            $this->firstNode = $node;
            return;
        }

        while ($currentNode->nextNode !== null) {
            $this->prevNode = $currentNode;
            $currentNode = $currentNode->nextNode;
        }

        $node->prevNode = $currentNode;
        $node->prevNode->nextNode = $node;

    }

    public function traverse()
    {
        $currentNode = $this->firstNode;
        while ($currentNode !== null) {
            echo "Nodo actual: " . $currentNode->value . "\n";
            echo "Nodo previo: " . ($currentNode->prevNode->value ?? null) . "\n";
            echo "Nodo siguiente: " . ($currentNode->nextNode->value ?? null) . "\n";
            echo "\n";

            $currentNode = $currentNode->nextNode;
        }
    }
}

$list = new DoublyLinkedList();
$list->insert(2);
$list->insert(7);
$list->insert(6);
$list->insert(8);
$list->insert(9);
$list->insert(15);
$list->traverse();
