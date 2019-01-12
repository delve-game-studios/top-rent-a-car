<?php

namespace App\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as OldControllerMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class ControllerMakeCommand extends OldControllerMakeCommand
{
    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        // Change the directory and namespace of the models to app/Models/{ModelName}
        if ($this->option('admin')) {
            return 'Admin/' . trim($this->argument('name'));
        }

        return 'Front/' . trim($this->argument('name'));
    }

    protected function getOptions()
    {
        $options = parent::getOptions();
        $options[] = ['admin', 'd', InputOption::VALUE_NONE, 'Generate the controller as admin controller, otherwise is a front controller'];
        return $options;
    }

    protected function getStub()
    {
        $stub = null;

        if ($this->option('admin')) {
            $stub = __DIR__ . '/stubs/controller.admin.stub';
        }

        return $stub ?? parent::getStub();
    }
}
