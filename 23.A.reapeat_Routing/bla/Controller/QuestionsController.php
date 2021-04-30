<?php
namespace Controller;

class QuestionsController
{
    public function ask()
    {
        echo "this is ask func";
    }
    public function answer($id)
    {
        echo "u r answering the $id question";
    }
}