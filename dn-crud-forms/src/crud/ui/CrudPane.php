<?php
namespace crud\ui;

use crud\Crud;
use crud\CrudEntity;
use crud\CrudException;
use crud\Cruds;
use crud\ui\CrudUI;
use php\gui\layout\UXAnchorPane;

class CrudPane extends UXAnchorPane
{
    protected CrudUI $crudUi;

    /**
     * CrudPane constructor.
     * @param array $schema
     * @param Crud|null $crud
     * @throws CrudException
     */
    public function __construct(array $schema, Crud $crud = null)
    {
        parent::__construct();

        $crud = $crud ?: Cruds::create();

        $crudEntity = new CrudEntity($schema);
        $crudUi = new CrudUI($crud, $crudEntity);

        $this->crudUi = $crudUi;

        $window = $crudEntity->getWindow();

        if ($window['height']) $this->height = $this->minHeight = $window['height'];
        if ($window['width']) $this->width = $this->minWidth = $window['width'];

        $this->title = $crud->t($crudEntity->getName());

        $UXPane = $crudUi->makeUi();
        UXAnchorPane::setAnchor($UXPane, 20);

        /*$headHeight = $this->height;
        $UXPane->observer('height')->addOnceListener(fn($_, $new) => $this->minHeight = $new + 40);*/
        $this->add($UXPane);
    }


    public function setEntity($data)
    {
        $this->crudUi->setEntity($data);
        $this->crudUi->load();
    }

    public function updateEntity($data)
    {
        $this->crudUi->updateEntity($data);
        $this->crudUi->load();
    }

    public function getEntity()
    {
        return $this->crudUi->save();
    }

    /**
     * @return CrudUI
     */
    public function getCrudUi(): CrudUI
    {
        return $this->crudUi;
    }
}