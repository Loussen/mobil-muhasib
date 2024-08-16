<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LegislativeActsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LegislativeActsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LegislativeActsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\LegislativeActs::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/legislative-acts');
        CRUD::setEntityNameStrings('legislative acts', 'legislative acts');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn('title');
        $this->crud->addColumn([
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
        ]);
        $this->crud->addColumn('status');

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
        CRUD::setValidation(LegislativeActsRequest::class);

        $this->crud->addField([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
            'placeholder' => 'Your title here',
        ]);
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Will be automatically generated from your title, if left empty.',
            // 'disabled' => 'disabled'
        ]);
        $this->crud->addField([
            'name' => 'date',
            'label' => 'Date',
            'type' => 'date',
            'default' => date('Y-m-d'),
        ]);
        $this->crud->addField([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'tinymce',
            'placeholder' => 'Your textarea text here',
        ]);
        $this->crud->addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'hint' => 'Dimensions: 390 X 450'
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => 'Status',
            'type' => 'select_from_array',
            'options' => [
                'PUBLISHED' => 'PUBLISHED',
                'DRAFT' => 'DRAFT',
            ],
        ]);
        $this->crud->addField([   // CustomHTML
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
        ]);
        $this->crud->addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'hint' => 'Max: 60 character',
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'hint' => '160 simvol olmalıdır',
            'store_in' => 'extras',
        ]);
        $this->crud->addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('backpack::pagemanager.meta_keywords'),
            'fake' => true,
            'hint' => '8 açar söz və vergüllə ayrılmalıdır',
            'store_in' => 'extras',
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
    }
}
