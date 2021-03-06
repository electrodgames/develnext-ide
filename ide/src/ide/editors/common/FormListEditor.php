<?php
namespace ide\editors\common;

use ide\Ide;
use ide\project\supports\JavaFXProjectSupport;

class FormListEditor extends ObjectListEditor
{
    public function updateUi()
    {
        $this->comboBox->items->clear();

        $this->comboBox->items->add(new ObjectListEditorItem($this->emptyItemText, null, ''));

        $project = Ide::get()->getOpenedProject();

        if ($this->senderCode) {
            $this->comboBox->items->add(new ObjectListEditorItem('ui.current.form::Текущая форма', null, $this->senderCode));
        }

        if ($project && $project->hasSupport('javafx')) {
            /** @var JavaFXProjectSupport $javafx */
            $javafx = $project->findSupport('javafx');

            foreach ($javafx->getFormEditors($project) as $formEditor) {
                $this->comboBox->items->add(new ObjectListEditorItem(
                    $formEditor->getTitle(),
                    Ide::get()->getImage($formEditor->getIcon()),
                    $formEditor->getTitle()
                ));
            }
        }
    }
}