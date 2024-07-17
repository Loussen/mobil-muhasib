<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeamCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TeamCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup(): void
    {
        CRUD::setModel(Team::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/team');
        CRUD::setEntityNameStrings('team', 'teams');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('surname');
        CRUD::column('position');
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
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(TeamRequest::class);
        CRUD::field('name')->wrapper(['class' => 'form-group col-md-4']);
        CRUD::field('surname')->wrapper(['class' => 'form-group col-md-4']);
        CRUD::field('slug')->type('text')->wrapper(['class' => 'form-group col-md-4']);
        CRUD::field('email')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('position')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('bio')->type('tinymce');
        CRUD::addField([
            'name' => 'image',
            'label' =>'Image',
            'type' => 'image',
            'upload' => true,
            'hint' => 'Dimensions: 435 X 550'
        ]);

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
            'min_rows'      => 0,
            'init_rows'     => 0,
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

    protected function autoSetupShowOperation(): void
    {
        $this->setupListOperation();

        CRUD::addColumn([
            'name' => 'social_networks',
            'type' => 'repeatable',
            'subfields' => [
                [
                    'name'    => 'icon',
                    'wrapperAttributes' => ['class' => 'form-group col-md-2'],
                ],
                [
                    'name'    => 'link',
                    'type'  => 'url',
                    'wrapper' => [
                        'class' => 'col-md-6',
                    ],
                ],
            ],
        ]);
    }
}
