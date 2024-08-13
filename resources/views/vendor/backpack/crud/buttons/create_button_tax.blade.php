@php use App\Enums\TaxEnum; @endphp
<a href="{{ url($crud->route.'/create?type='.Request::get('type') ?? TaxEnum::getDefaultName()) }}"
   class="btn btn-primary ladda-button" data-style="zoom-in">
    <span class="ladda-label">
        <i class="la la-plus"></i> {{ trans('backpack::crud.add') }} {{ $crud->entity_name }}
    </span>
</a>
