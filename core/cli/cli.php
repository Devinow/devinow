<?php

require_once __DIR__ . '/classes/controller.php';
require_once __DIR__ . '/classes/model.php';
require_once __DIR__ . '/classes/view.php';


use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;
use CLI\Controller;
use CLI\Model;
use CLI\View;

class Complex extends CLI
{

    /**
     * Register options and arguments on the given $options object
     *
     * @param Options $options
     * @return void
     */
    protected function setup(Options $options)
    {
        $options->setHelp('Devinow CLI');

        $options->registerCommand('create:view', 'The Create View Command');
        $options->registerCommand('remove:view', 'The Remove View Command');
        //$options->registerCommand('view:clear', 'The Removing All Views Cache Command');

        $options->registerCommand('create:model', 'The Create Model Command');
        $options->registerCommand('remove:model', 'The Remove Model Command');

        $options->registerCommand('create:controller', 'The Create Controller Command');
        $options->registerCommand('remove:controller', 'The Remove Controller Command');

        $options->registerArgument('name', 'The View Name', true, 'create:view');
        $options->registerArgument('name', 'The View Name', true, 'remove:view');

        $options->registerArgument('name', 'The Model Name', true, 'create:model');
        $options->registerArgument('name', 'The Model Name', true, 'remove:model');

        $options->registerArgument('name', 'The Controller Name', true, 'create:controller');
        $options->registerArgument('name', 'The Controller Name', true, 'remove:controller');
    }

    /**
     * Your main program
     *
     * Arguments and options have been parsed when this is run
     *
     * @param Options $options
     * @return void
     */
    protected function main(Options $options)
    {
        if(!empty($options->getArgs()[0])){
            $arg = $options->getArgs()[0];

            $model = new Model();
            $controller = new Controller();
            $view = new View();

            switch($options->getCmd()){
                case 'create:view':
                    $view = $view->create($arg);
                    $view = explode('-',$view);
                
                    if($view[0] == 'success'){
                        $this->success($view[1]);
                    }else{
                        $this->error($view[1]);
                    }

                    break;
                case 'remove:view':
                    $view = $view->remove($arg);
                    $view = explode('-',$view);
                
                    if($view[0] == 'success'){
                        $this->success($view[1]);
                    }else{
                        $this->error($view[1]);
                    }

                    break;
                case 'create:model':
                    $model = $model->create($arg);
                    $model = explode('-',$model);
                
                    if($model[0] == 'success'){
                        $this->success($model[1]);
                    }else{
                        $this->error($model[1]);
                    }

                    break;
                case 'remove:model':
                    $model = $model->remove($arg);
                    $model = explode('-',$model);
                
                    if($model[0] == 'success'){
                        $this->success($model[1]);
                    }else{
                        $this->error($model[1]);
                    }

                    break;
                case 'create:controller':
                    $controller = $controller->create($arg);
                    $controller = explode('-',$controller);

                    if($controller[0] == 'success'){
                        $this->success($controller[1]);
                    }else{
                        $this->error($controller[1]);
                    }

                    break;
                case 'remove:controller':
                    $controller = $controller->remove($arg);
                    $controller = explode('-',$controller);

                    if($controller[0] == 'success'){
                        $this->success($controller[1]);
                    }else{
                        $this->error($controller[1]);
                    }

                    break;
                default:
                    echo $options->help();
                    exit;

                    break;
            }
        }else{
            echo $options->help();
            exit;
        }
    }
}

?>