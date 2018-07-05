<?php
namespace ide\formats\form\elements;

use ide\formats\form\AbstractFormElement;
use php\gui\event\UXMouseEvent;
use php\gui\UXColorPicker;
use php\gui\UXMaterialButton;
use php\gui\UXMaterialColorPicker;
use php\gui\UXNode;
use php\gui\UXRating;
use php\gui\UXToggleSwitch;

class MaterialColorPickerFormElement extends ColorPickerFormElement
{
    public function getGroup()
    {
        return 'Material UI';
    }

    public function getName()
    {
        return 'ui.element.material.color.picker::Material Поле для цвета';
    }

    public function getElementClass()
    {
        return UXMaterialColorPicker::class;
    }

    public function isOrigin($any)
    {
        return $any instanceof UXMaterialColorPicker;
    }

    /**
     * @return UXNode
     */
    public function createElement()
    {
        return new UXMaterialColorPicker();
    }
}