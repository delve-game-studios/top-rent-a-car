<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as OldModelMakeCommand;

class ModelMakeCommand extends OldModelMakeCommand
{
    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        // Change the directory and namespace of the models to app/Models/{ModelName}
        return 'Models/' . trim($this->argument('name'));
    }
}
