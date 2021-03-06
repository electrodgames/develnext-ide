<?php
namespace ide\commands\account;

use ide\editors\AbstractEditor;
use ide\forms\AccountProfileEditForm;
use ide\misc\AbstractCommand;

/**
 * Class AccountLogoutCommand
 * @package ide\commands\account
 *
 */
class AccountInfoCommand extends AbstractCommand
{
    public function getName()
    {
        return "command.edit::Редактировать";
    }

    public function getIcon()
    {
        return 'icons/accountEdit16.png';
    }

    public function getCategory()
    {
        return 'account';
    }

    public function withAfterSeparator()
    {
        return false;
    }

    public function onExecute($e = null, AbstractEditor $editor = null)
    {
        $dialog = new AccountProfileEditForm();
        $dialog->showAndWait();
    }
}