<?php
namespace Controller;

class QuestionsController
{
    public function ask()
    {
        echo "u r asking a q.";
    }
    public function answer($id)
    {
        echo "u r answering the $id question";
    }
}