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

    public function insert(int $value)
    {
        $node = new Node($value);
        $currentNode = $this->firstNode;

        if ($currentNode === null) {
            $this->firstNode = $node;
            return;
        }

        while ($currentNode->nextNode !== null) {
            $currentNode = $currentNode->nextNode;
        }

        $node->prevNode = $currentNode;
        $node->prevNode->nextNode = $node;

    }

    public function delete(int $value)
    {
        echo "Eliminando nodo con value $value \n\n";
        $currentNode = $this->firstNode;
        $prevNode = null;

        while ($currentNode->value !== $value) {
            $prevNode = $currentNode;
            $currentNode = $currentNode->nextNode;
        }

        $currentNode->prevNode->nextNode = $currentNode->nextNode;
        $currentNode->nextNode->prevNode = $prevNode;
    }

    public function traverse()
    {
        $currentNode = $this->firstNode;
        while ($currentNode !== null) {
            echo "Nodo previo: " . ($currentNode->prevNode->value ?? null) . "\n";
            echo "Nodo actual: " . $currentNode->value . "\n";
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
$list->insert(15);
$list->traverse();
$list->delete(6);
$list->traverse();
