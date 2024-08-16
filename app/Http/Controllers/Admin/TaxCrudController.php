<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TaxEnum;
use App\Http\Requests\TaxRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Request;

/**
 * Class TaxCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TaxCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    private string $type;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        $type = getCleanString(Request::get('type'));
        $this->type = ($type && in_array($type,TaxEnum::names())) ? $type : TaxEnum::getDefaultName();

        $text = TaxEnum::fromName($this->type)->value;

        CRUD::setModel(\App\Models\Tax::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tax');
        CRUD::setEntityNameStrings($text, $text);
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->removeButton('create');
        $this->crud->addButtonFromView('top', 'create', 'create_button_tax');

        CRUD::setValidation(TaxRequest::class);
        $this->crud->addClause('where', 'type', $this->type);
        CRUD::column('question');

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TaxRequest::class);
        CRUD::field('question')->type('textarea');
        CRUD::addField([
            'name' => 'answer',
            'type' => 'tinymce',
        ]);
        CRUD::addField([
            'name' => 'type',
            'type' => 'hidden',
            'value' => TaxEnum::fromName($this->type)->name
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();

        $this->crud->removeField('type');
    }
}
