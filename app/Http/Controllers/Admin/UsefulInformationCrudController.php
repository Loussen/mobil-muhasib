<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsefulInformationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UsefulInformationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsefulInformationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\UsefulInformation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/useful-information');
        CRUD::setEntityNameStrings('Faydalı Məlumat', 'Faydalı Məlumatlar');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('slug');
        $this->crud->addColumn([
            'name' => 'featured',
            'label' => 'Featured',
            'type' => 'check',
        ]);
        CRUD::addColumn([
            'name' => 'inner_image',
            'type' => 'image',
            'disk' => 'public',
            'prefix' => ''
        ]);
        CRUD::addColumn([
            'name' => 'image',
            'type' => 'image',
            'disk' => 'public',
            'prefix' => ''
        ]);

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
        CRUD::setValidation(UsefulInformationRequest::class);
        CRUD::field('title')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('slug')->type('text')->wrapper(['class' => 'form-group col-md-6'])->hint('Will be automatically generated from your title, if left empty.');
        CRUD::field('short_description')->type('textarea');
        CRUD::addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'hint' => 'Dimensions: 280 X 380',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        CRUD::addField([
            'name' => 'inner_image',
            'type' => 'image',
            'hint' => 'Dimensions: 1290 X 700',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'tinymce',
            'placeholder' => 'Your textarea text here',
        ]);
        CRUD::addField([
            'name' => 'featured',
            'label' => 'Featured item',
            'type' => 'checkbox',
        ]);
        CRUD::addField([
            'name' => 'metas_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
        ]);
        CRUD::addField([
            'name' => 'meta_title',
            'label' => trans('backpack::pagemanager.meta_title'),
            'fake' => true,
            'hint' => 'Max: 60 character',
            'store_in' => 'extras',
        ]);
        CRUD::addField([
            'name' => 'meta_description',
            'label' => trans('backpack::pagemanager.meta_description'),
            'fake' => true,
            'hint' => '160 simvol olmalıdır',
            'store_in' => 'extras',
        ]);
        CRUD::addField([
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
