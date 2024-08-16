<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ContactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContactCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
//    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Contact::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contact');
        CRUD::setEntityNameStrings('əlaqə', 'əlaqələr');
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
        CRUD::column('short_description');
        CRUD::column('phone');
        CRUD::column('address');

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
        CRUD::setValidation(ContactRequest::class);
        CRUD::field('title');
        CRUD::field('short_description')->type('textarea');
        CRUD::field('phone');
        CRUD::field('address')->type('textarea');

        $subfieldsSocialProfileInfo[] = [
            'name'  => 'icon',
            'type'  => 'icon_picker',
            'iconset' => 'fontawesome',
            'wrapper' => [
                'class' => 'form-group col-md-2 checkbox-align-bottom'
            ],
        ];

        $subfieldsSocialProfileInfo[] = [
            'name'        => 'link',
            'type'        => 'url',
            'wrapper'     => [
                'class' => 'form-group col-md-10'
            ],
        ];

        CRUD::addField([
            'name'          => 'social_networks',
            'type'          => "repeatable",
            'subfields'     => $subfieldsSocialProfileInfo,
            'max_rows'      => 10,
            'min_rows'      => 1,
            'init_rows'     => 1,
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

    protected function autoSetupShowOperation()
    {
        $this->setupListOperation();
        $subfieldsSocialProfileInfo[] = [
            'name'  => 'icon',
        ];

        $subfieldsSocialProfileInfo[] = [
            'name'        => 'link',
            'type'        => 'url',
        ];

        CRUD::addColumn([
            'name'          => 'social_networks',
            'type'          => "repeatable",
            'subfields'     => $subfieldsSocialProfileInfo,
        ]);
    }
}
