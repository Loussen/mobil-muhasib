@includeWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_start'))
<div class="card" style="margin-bottom: 1.5em;">
    <div class="card-body p-3 d-flex align-items-center simple_stats">
        @if(isset($widget['icon']))
            <i class="fa {!! $widget['icon'] !!} p-3 font-2xl mr-3"></i>
        @endif
        @if(isset($widget['image']))
            <img src="{!! $widget['image'] !!}" class="p-3 font-2xl mr-3" style="width: 70px"/>
        @endif
        <div>
            <div class="text-value-sm text-primary"> {!! $widget['value'] !!}</div>
            <div class="text-muted text-uppercase font-weight-bold small">{!! $widget['label'] !!}</div>
        </div>
    </div>
</div>

@includeWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_end'))
