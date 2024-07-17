<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PortfolioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PortfolioCrudController extends CrudController
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
        CRUD::setModel(Portfolio::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/portfolio');
        CRUD::setEntityNameStrings('portfolio', 'portfolios');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('name');
        CRUD::column('description');
//        CRUD::addColumn([
//            'name' => 'content',
//            'label' => 'Content',
//            'type' => 'tinymce',
//            'placeholder' => 'Your textarea text here',
//        ]);
        CRUD::addColumn([
            'name' => 'image',
            'type' => 'image',
            'disk' => 'public',
            'prefix' => ''
        ]);
        CRUD::addColumn([
            'name' => 'inner_image',
            'type' => 'image',
            'disk' => 'public',
            'prefix' => ''
        ]);
        CRUD::column('work_date');

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
        CRUD::setValidation(PortfolioRequest::class);
        CRUD::field('name')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::field('description')->type('textarea')->wrapper(['class' => 'form-group col-md-6']);
        CRUD::addField([
            'name' => 'image',
            'label' =>'Image',
            'type' => 'image',
            'upload' => true,
            'wrapper' => ['class' => 'form-group col-md-6'],
            'hint' => 'Dimensions: 520 X 700'
        ]);

        CRUD::addField([
            'name' => 'inner_image',
            'label' =>'Inner Image',
            'type' => 'image',
            'upload' => true,
            'wrapper' => ['class' => 'form-group col-md-6'],
            'hint' => 'Dimensions: 520 X 700'
        ]);

        CRUD::addField([
            'name' => 'slug',
            'label' => 'Slug (URL)',
            'type' => 'text',
            'hint' => 'Will be automatically generated from your title, if left empty.',
        ]);
        CRUD::addField([
            'name' => 'content',
            'label' => 'Content',
            'type' => 'tinymce',
            'placeholder' => 'Your textarea text here',
        ]);
        CRUD::field('work_date')->type('date')->wrapper(['class' => 'form-group col-md-6']);
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
//        CRUD::addField([
//            'name' => 'meta_image',
//            'label' => 'Meta image',
//            'type' => 'upload',
//            'hint' => 'Dimensions: (1200 X 600) and (max: 8 MB)',
//            'fake' => true,
//            'store_in' => 'extras',
//            'withFiles' => [
//                'disk' => 'public',
//                'path' => 'uploads/images/portfolio/meta_image'
//            ]
//        ]);

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
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
