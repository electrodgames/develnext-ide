<?php
namespace develnext\bundle\sql;

use develnext\bundle\sql\components\SqliteClientComponent;
use develnext\bundle\sql\components\SqliteStorageComponent;
use ide\bundle\AbstractBundle;
use ide\bundle\AbstractJarBundle;
use ide\formats\ScriptModuleFormat;
use ide\Ide;
use ide\project\Project;

class SqliteBundle extends AbstractJarBundle
{
    function getName()
    {
        return "SQLite";
    }

    function getDescription()
    {
        return "Пакет для работы с базой данных SQLite 3";
    }

    public function isAvailable(Project $project)
    {
        return true;
    }

    public function getDependencies()
    {
        return [
            SqlBundle::class
        ];
    }

    public function onAdd(Project $project, AbstractBundle $owner = null)
    {
        parent::onAdd($project, $owner);

        $format = Ide::get()->getRegisteredFormat(ScriptModuleFormat::class);

        if ($format) {
            $format->register(new SqliteStorageComponent());
            $format->register(new SqliteClientComponent());
        }
    }

    public function onRemove(Project $project, AbstractBundle $owner = null)
    {
        parent::onRemove($project, $owner);

        $format = Ide::get()->getRegisteredFormat(ScriptModuleFormat::class);

        if ($format) {
            $format->unregister(new SqliteStorageComponent());
            $format->unregister(new SqliteClientComponent());
        }
    }
}