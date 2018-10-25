<?php

use Illuminate\Database\Migrations\Migration;
use Uccello\Core\Database\Migrations\Traits\TablePrefixTrait;
use Uccello\Core\Models\Module;
use Uccello\Core\Models\Domain;
use Uccello\Core\Models\Tab;
use Uccello\Core\Models\Block;
use Uccello\Core\Models\Field;
use Uccello\Core\Models\Filter;

class CreateModuleSkeletonStructure extends Migration
{
    use TablePrefixTrait;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $module = $this->createModule();
        $this->activateModuleOnDomain($module);
        $this->createTabsBlocksFields($module);
        $this->createFilters($module);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Module::where('name', 'module-skeleton')->forceDelete();
    }

    protected function createModule()
    {
        $module = new  Module();
        $module->name = 'module-skeleton';
        $module->icon = 'layers';
        $module->model_class = 'Uccello\ModuleSkeleton\Models\ModuleSkeleton';
        $module->data = ["package" => "module-skeleton", "admin" => false];
        $module->save();

        return $module;
    }

    protected function activateModuleOnDomain($module)
    {
        $domain = Domain::first();
        $domain->modules()->attach($module);
    }

    protected function createTabsBlocksFields($module)
    {
        // Main tab
        $tab = new Tab();
        $tab->label = 'tab.main';
        $tab->icon = null;
        $tab->sequence = 0;
        $tab->module_id = $module->id;
        $tab->save();

        // General block
        $block = new Block();
        $block->label = 'block.general';
        $block->icon = 'info';
        $block->sequence = 0;
        $block->tab_id = $tab->id;
        $block->module_id = $module->id;
        $block->save();

        // Name
        $field = new Field();
        $field->name = 'name';
        $field->uitype_id = uitype('text')->id;
        $field->displaytype_id = displaytype('everywhere')->id;
        $field->data = ['rules' => 'required'];
        $field->sequence = 0;
        $field->block_id = $block->id;
        $field->module_id = $module->id;
        $field->save();
    }

    protected function createFilters($module)
    {
        $filter = new Filter();
        $filter->module_id = $module->id;
        $filter->domain_id = null;
        $filter->user_id = null;
        $filter->name = 'filter.all';
        $filter->type = 'list';
        $filter->columns = ['id', 'name'];
        $filter->conditions = null;
        $filter->order_by = null;
        $filter->is_default = true;
        $filter->is_public = false;
        $filter->save();
    }
}
