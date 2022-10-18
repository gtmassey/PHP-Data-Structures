<?php

namespace DataStructures;

use DataStructures\Node;

class BinaryTree
{
    public Node|null $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function add($data): Node
    {
        //create a new node
        $node = new Node($data);

        //if the root is null, then the new node is the root
        if($this->root == NULL) {
            $this->root = $node;
        }

        //if given data is greater than the root value
        //call add() again and insert recursively into right subtree
        else if($node->data > $this->root->data) {
            $this->root->right = $this->add($node->data);
        }

        //if given val is less than root->key,
        //call add() again and insert recursively into the left subtree
        else if ($node->data < $this->root->data) {
            $this->root->left = $this->add($node->data);
        }

        //return the root
        return $this->root;
    }

    /**
     * @param $data
     * @return void
     */
    public function delete($data): void
    {
        //if the root is null, then the tree is empty
        if($this->root == NULL) {
            return;
        }

        //if given data is greater than the root value
        //call delete() again and delete recursively from right subtree
        else if($data > $this->root->data) {
            $this->getRight()->delete($data);
        }

        //if given data is less than the root value
        //call delete() again and delete recursively from left subtree
        else if($data < $this->root->data) {
            $this->getLeft()->delete($data);
        }

        //if given data is equal to the root value
        else {
            //if the root has no child
            if($this->root->left == NULL && $this->root->right == NULL) {
                $this->root = NULL;
            }

            //if the root has only one child
            else if($this->root->left == NULL) {
                $this->root = $this->root->right;
            }
            else if($this->root->right == NULL) {
                $this->root = $this->root->left;
            }

            //if the root has two children
            else {
                //find the minimum value in the right subtree
                $min = $this->findMin($this->root->right);

                //replace the root value with the minimum value
                $this->root->data = $min->data;

                //delete the minimum value from the right subtree
                $this->getRight()->delete($min->data);
            }
        }
    }
}